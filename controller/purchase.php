<?php
require_once "../model/func.php";
require_once "../../const.php";


if(isset($_POST["state"]) && $_POST["state"] == "purchase"){
    //dbに接続
    $link = connect_db (HOST,USER_ID,PASSWORD,DB_NAME);
    if($link == false){
        //エラー処理
        header("location: error.php?error=ERROR");
        exit;
    }
    $query = "UPDATE item SET sell_date = '" . date("Y-m-d") . "' WHERE item.id = " . $_GET["id"];
    $result = mysqli_query($link, $query);
    if($result == false){
        mysqli_close($link);
        header("location: error.php?error=購入処理中に予期せぬエラーが発生しました。支払は完了していません");
        exit;
    }
    $query = "INSERT INTO purchase (user_id, item_id) VALUES ('" . $_COOKIE["login_id"] . "', '" . $_GET["id"] . "')";
    $result = mysqli_query($link, $query);
    if($result == false){
        mysqli_close($link);
        header("location: error.php?error=購入処理中に予期せぬエラーが発生しました。支払は完了していません");
        exit;
    }

    $query = "SELECT * FROM item WHERE id=" . $_GET["id"];
    $result = mysqli_query($link,$query);
    if($result == false){
        header("location: error.php?error=ERROR");
        var_dump($query);
        mysqli_close($link);
        exit;
    }
    $item = mysqli_fetch_assoc($result);

    $query = "SELECT * FROM user WHERE id=" . $item["user_id"];
    $result = mysqli_query($link,$query);
    if($result == false){
        header("location: error.php?error=ERROR");
        var_dump($query);
        mysqli_close($link);
        exit;
    }
    $seller = mysqli_fetch_assoc($result);

    $query = "SELECT * FROM user WHERE id=" . $_COOKIE["login_id"];
    $result = mysqli_query($link,$query);
    if($result == false){
        header("location: error.php?error=ERROR");
        var_dump($query);
        mysqli_close($link);
        exit;
    }
    $user = mysqli_fetch_assoc($result);

    //購入者通知
    $query = "INSERT INTO parsonal_notification (user_id, content, is_read, is_deleated,date,title) VALUES (" . $_COOKIE["login_id"] . ",
    '" . $seller["user_name"] . "さんの" . $item["name"] . "を購入しました！
    商品が届いたら、" . $seller["user_name"] . "さんに評価をしましょう。'
    , NULL, NULL,'" . date("Y-m-d") . "','商品を購入しました')";
    $result = mysqli_query($link,$query);
    if($result == false){
        header("location: error.php?error=ERROR");
        var_dump($query);
        mysqli_close($link);
        exit;
    }
    //出品者通知
    $query = "INSERT INTO parsonal_notification (user_id, content, is_read, is_deleated,date,title) VALUES (" . $item["user_id"] . ",
    '" . $user["user_name"] . "さんが" . $item["name"] . "を購入しました！
    発送を行いましょう。
    '
    , NULL, NULL,'" . date("Y-m-d") . "','商品が購入されました')";
    $result = mysqli_query($link,$query);
    if($result == false){
        header("location: error.php?error=ERROR");
        var_dump($query);
        mysqli_close($link);
        exit;
    }

    mysqli_close($link);
    header("location: purchase_complete.php?id=" . $_GET["id"]);
    exit;
}

//購入者のユーザIDがないとき時
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
//商品情報を取得
$query = "SELECT * FROM item WHERE id=" . $_GET["id"];
$result = mysqli_query($link,$query);
if($query == false){
    header("location: error.php?error=ERROR");
    exit;
}
$item = mysqli_fetch_assoc($result);

$query = "SELECT * FROM user WHERE id = " . $item["user_id"];
$seller = mysqli_fetch_assoc(mysqli_query($link,$query));

$query = "SELECT * FROM send_address WHERE user_id = " . $_COOKIE["login_id"];
$send_address = mysqli_fetch_assoc(mysqli_query($link,$query));

$query = "SELECT * FROM payment WHERE user_id = " . $_COOKIE["login_id"];
$payment = mysqli_fetch_assoc(mysqli_query($link,$query));
mysqli_close($link);

$btn_active = "";
if($payment == NULL || $send_address == NULL){
    $btn_active = "disabled";
}
require_once "../view/purchase.php";
?>