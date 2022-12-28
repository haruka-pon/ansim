<?php
require_once "../model/func.php";
require_once "../../const.php";
//dbに接続
$link = connect_db (HOST,USER_ID,PASSWORD,DB_NAME);
if($link == false){
    //エラー処理
}
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
require_once "../view/my_page_buy.php";
?>