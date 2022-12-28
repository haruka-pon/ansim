<?php
require_once "../model/func.php";
require_once "../../const.php";
if(isset($_REQUEST["state"]) && $_REQUEST["state"] == "back"){
    header("location: news.php");
    exit;
}
//dbに接続
$link = connect_db (HOST,USER_ID,PASSWORD,DB_NAME);
if($link == false){
    //エラー処理
    header("location: error.php?error=ERROR");
    exit;
}
$query = "SELECT * FROM parsonal_notification WHERE id = " . $_GET["id"];
$result = mysqli_query($link,$query);
$notification = mysqli_fetch_assoc($result);
mysqli_close($link);
require_once "../view/news_detail.php";
?>