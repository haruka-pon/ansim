<?php

require_once "../model/func.php";
require_once "../../const.php";
session_start();
//購入者のユーザIDがないとき時
if(false){
    header("location: sign_in.php");
    exit;
}
//dbに接続
$link = connect_db (HOST,USER_ID,PASSWORD,DB_NAME);
if($link == false){
    //エラー処理
}


function get_purchase_list($where = ""){
    $item = [];
    $link = connect_db(HOST,USER_ID,PASSWORD,DB_NAME);
    $query = "SELECT it.*, u.prime_status FROM item it
    INNER JOIN user u
    ON it.user_id = u.id
    WHERE " . $where;
    $result = mysqli_query($link,$query);
    mysqli_close($link);
    while($tmp = mysqli_fetch_assoc($result)){
        $item[] = $tmp;
    }
    return $item;
}


// user　DB取得
$query = "SELECT * FROM user WHERE id = " . $_COOKIE["login_id"];
$user = mysqli_fetch_assoc(mysqli_query($link,$query));

// 出品商品　DB取得
$query_sell = "SELECT it.*, u.prime_status FROM item it
INNER JOIN user u
ON it.user_id = u.id
WHERE user_id = " . $_COOKIE["login_id"];
$sell_item = mysqli_fetch_assoc(mysqli_query($link,$query_sell));


//
$query = "SELECT SUM(price) as 'profit' FROM item WHERE user_id = " . $_COOKIE["login_id"] . " AND sell_date IS NOT NULL";
$profit = mysqli_fetch_assoc(mysqli_query($link,$query))["profit"];
var_dump($profit);
$profit = round($profit * 0.9);
// var_dump($sell_item);

// 購入商品　DB取得
$query_purchase = "SELECT * FROM purchase WHERE user_id = " . $_COOKIE["login_id"];
$result = mysqli_query($link,$query_purchase);
$purchase = [];
while($tmp = mysqli_fetch_assoc($result)){
    $purchase[] = $tmp["item_id"];
}
$p_item = [];
if(count($purchase) != 0){
    $query = "SELECT it.*, u.prime_status FROM item it
    INNER JOIN user u
    ON it.user_id = u.id
    WHERE id = ";
    foreach($purchase as $val){
        $query .= $val . " OR id = ";
    }
    $query .= "NULL";
    $result = mysqli_query($link,$query);
    while($tmp = mysqli_fetch_assoc($result)){
        $p_item[] = $tmp;
    }
}
mysqli_close($link);
require_once "../view/my_page.php";
?>