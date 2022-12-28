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
    $query = "INSERT INTO send_address (user_id, post_number, address, name) VALUES (" . $_COOKIE["login_id"] . ",'" . $_POST["post_number"] . "','" . $_POST["address"] ."','" . $_POST["name"] . "')";
    mysqli_query($link, $query);
    mysqli_close($link);
    var_dump($query);
    header("location: purchase.php?id=" . $_GET["id"]);
    exit;
}
require_once "../view/address.php";
?>