<?php
require_once "../model/func.php";
require_once "../../const.php";

//dbに接続
$link = connect_db (HOST,USER_ID,PASSWORD,DB_NAME);
if($link == false){
    //エラー処理
    header("location: error.php?error=ERROR");
    exit;
}
$query = "SELECT * FROM parsonal_notification WHERE user_id = " . $_COOKIE["login_id"] . " ORDER BY date DESC";
$result = mysqli_query($link,$query);
$notification = [];
while($tmp = mysqli_fetch_assoc($result)){
    $notification[] = $tmp;
}

mysqli_close($link);
require_once "../view/news.php";
?>