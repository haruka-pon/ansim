<?php
require_once "../model/func.php";
require_once "../../const.php";

if(isset($_POST["state"]) && $_POST["state"] == "cancel"){
    header("location: my_page.php");
    exit;
}
if(!isset($_COOKIE["login_id"])){
    header("location: sign_in.php");
    exit;
}

//dbに接続
$link = connect_db (HOST,USER_ID,PASSWORD,DB_NAME);
if($link == false){
    //エラー処理
    header("location: error.php?error=ERROR");
    exit;
}

if(isset($_POST["state"]) && $_POST["state"] == "confirm"){
    //dbに接続
    $link = connect_db (HOST,USER_ID,PASSWORD,DB_NAME);
    if($link == false){
        //エラー処理
        header("location: error.php?error=ERROR");
        exit;
    }
    $query = "UPDATE user SET prime_status = " . 1 . " WHERE user.id = " . $_COOKIE["login_id"];
    $result = mysqli_query($link, $query);
    if($result == false){
        mysqli_close($link);
        header("location: error.php?error=支払い処理中に予期せぬエラーが発生しました。支払いは完了していません");
        exit;
    }
    mysqli_close($link);
    header("location: my_page.php");
    exit;
}

$query = "SELECT * FROM payment WHERE user_id = " . $_COOKIE["login_id"];
$payment = mysqli_fetch_assoc(mysqli_query($link,$query));
mysqli_close($link);
require_once "../view/premium_sign_up.php";
?>