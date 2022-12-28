<?php
require_once "../../const.php";
require_once "../model/func.php";
if(isset($_POST["purchase"])){
    header("location: purchase.php?id=" . $_GET["id"]);
    exit;
}
if(!isset($_GET["id"])){
    header("location: home.php");
    exit;
}
$item = get_item_list($where = " && item.id=" . $_GET["id"]);
if(count($item) == 0){
    header("location: error.php?error=商品が見つかりません");
    exit;
}
//DB接続
$link = connect_db(HOST,USER_ID,PASSWORD,DB_NAME);
if($link == false){
    //接続エラー
    header("location: error.php?error=connecting_to_db_server_has_faild");
    exit;
}
$item = $item[0];
$query = "SELECT name FROM category WHERE id = " . $item["category_id"];
$category = mysqli_fetch_assoc(mysqli_query($link,$query))["name"];

$query = "SELECT item_condition FROM item_condition WHERE id = " . $item["item_condition_id"];
$item_condition = mysqli_fetch_assoc(mysqli_query($link,$query))["item_condition"];

$query = "SELECT who FROM who_pays_fee WHERE id = " . $item["who_pays_fee"];
$fee = mysqli_fetch_assoc(mysqli_query($link,$query))["who"];


$query = "SELECT * FROM like_list WHERE item_id = " . $_GET["id"];
$result = mysqli_query($link,$query);
$fav_info = [];
while($row = mysqli_fetch_assoc($result)){
    $fav_info[] = $row;
}

$fav_flg = true;
if(isset($_COOKIE['login_id'])){
    foreach($fav_info as $fav){
        if($fav['item_id'] == $_GET["id"] && $fav['user_id'] == $_COOKIE['login_id']){
            $fav_flg = false;
        }else{
            $fav_flg = true;
        }
    }
}

if(isset($_POST['submit']) && $_POST['submit'] == 'fav'){
    foreach($fav_info as $fav){
        if($fav['item_id'] == $_GET["id"] && $fav['user_id'] == $_COOKIE['login_id']){
            $query = "DELETE FROM like_list WHERE item_id=" . $_GET["id"] . " AND user_id =" . $_COOKIE['login_id'];
        }else{
            $query = "INSERT INTO like_list(item_id, user_id) VALUES('" . $_GET["id"] . "', '" . $_COOKIE['login_id'] . "')";
        }
    }
    if(count($fav_info) == 0){
        $query = "INSERT INTO like_list(item_id, user_id) VALUES('" . $_GET["id"] . "', '" . $_COOKIE['login_id'] . "')";
    }
    mysqli_query($link,$query);
    header('location: item_detail.php?id=' . $_GET["id"]);
    exit;
}


$query = "SELECT c.*, u.user_name FROM comment c
INNER JOIN user u
ON c.user_id = u.id
WHERE c.item_id = " . $_GET["id"] . "
ORDER BY c.commented_date DESC";
$result = mysqli_query($link,$query);
$com_info = [];
while($row = mysqli_fetch_assoc($result)){
    $com_info[] = $row;
}

if(isset($_POST['submit']) && $_POST['submit'] == 'comment'){
    $query = "INSERT INTO comment(item_id, user_id, comment, commented_date) VALUES(" . $_GET["id"] . ", " . $_COOKIE['login_id'] . ", '" . $_POST['comment_content'] . "', '" . date('Y-m-d') . "')";
    mysqli_query($link,$query);
    header('location: item_detail.php?id=' . $_GET["id"] . '#comment_box');
}

$query = "SELECT * FROM user WHERE id = " . $item["user_id"];
$seller = mysqli_fetch_assoc(mysqli_query($link,$query));
mysqli_close($link);
require_once "../view/item_detail.php";
?>