<?php
require_once "../model/func.php";
require_once "../../const.php";

if(isset($_POST["state"]) && $_POST["state"] == "back"){
    header("location: purchase.php?id=" . $_GET["id"]);
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
    $query = "INSERT INTO payment (user_id, card_number, name, expire_date, security_code)
     VALUES (" . $_COOKIE["login_id"] . "," . $_POST["card_number"] . ",'" . $_POST["name"] . "','" . $_POST["expire_date"] .  "'," . $_POST["security_code"] . ")";
    $result = mysqli_query($link, $query);
    if($result == false){
        mysqli_close($link);
        header("location: error.php?error=追加に失敗しました");
        exit;
    }
    mysqli_close($link);
    var_dump($query);
    header("location: purchase.php?id=" . $_GET["id"]);
    exit;
}

require_once "../view/payment.php";
?>