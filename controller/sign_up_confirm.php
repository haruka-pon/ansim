<?php
require_once "../../const.php";
require_once "../model/func.php";
session_start();
//確認ボタンで来てない場合ホームに戻す
if(!isset($_SESSION["state"]) || $_SESSION["state"] !== "sign_up_confirm"){
    header("location: home.php");
    exit;
}
//修正ボタンが押されたとき
if(isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "back"){
    $_SESSION["state"] = "sign_up_back";
    header("location: sign_up.php");
    exit;
}
$data = $_SESSION["sign_up_data"];
//登録ボタンが押されたとき
if(isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "register"){
    require_once "../model/func.php";
    require_once "../../const.php"; //const fileはこの位置に設置すること DB接続に使用する
    //DB接続
    $link = connect_db(HOST,USER_ID,PASSWORD,DB_NAME);
    if($link == false){
        //接続エラー
        header("location: error.php?error=connecting_to_db_server_has_faild");
        exit;
    }
    //書き込み
    $user_name = escape ($link,$data["user_name"]["value"]);
    $password = escape ($link,$data["password"]["value"]);
    $email = escape ($link,$data["email"]["value"]);
    $name = escape ($link,$data["name"]["value"]);
    $address = escape ($link,$data["address"]["value"]);
    $post_number = escape ($link,$data["post_number"]["value"]);
    $tel = escape ($link,$data["tel"]["value"]);
    $query = "INSERT INTO user (user_name,password,email,name,address,post_number,tel)
    VALUES ('" . $user_name .  "','" . $password . "','" . $email . "','" . $name . "','" . $address . "','" . $post_number . "','" . $tel . "')";
    $result = mysqli_query($link,$query);
    if($result == false){
        //実行エラー
        mysqli_close($link);
        header("location: error.php?error=db_query_has_failed");
        exit;
    }
    $id = mysqli_insert_id($link);
    mysqli_close($link);
    //userディレクトリを作成
    if(!file_exists("../../anism_user")){
        mkdir("../../ansim_user");
    }
    mkdir("../../ansim_user/". $id);
    mkdir("../../ansim_user/". $id . "/item");
    unset($_SESSION["state"]);
    unset($_SESSION["sign_up_data"]);
    header("location: sign_up_complete.php");
    exit;
}
require_once "../view/sign_up_confirm.php";
?>