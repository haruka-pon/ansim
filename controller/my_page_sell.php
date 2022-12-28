<?php
require_once "../model/func.php";
require_once "../../const.php";

function get_purchase_list($where = ""){
    $item = [];
    $link = connect_db(HOST,USER_ID,PASSWORD,DB_NAME);
    $query = "SELECT * FROM item
    WHERE " . $where;
    $result = mysqli_query($link,$query);
    mysqli_close($link);
    while($tmp = mysqli_fetch_assoc($result)){
        $item[] = $tmp;
    }
    return $item;
}

//dbに接続
$link = connect_db (HOST,USER_ID,PASSWORD,DB_NAME);
if($link == false){
    //エラー処理
}

// 出品商品　DB取得
$query_sell = "SELECT it.*, u.prime_status FROM item it
INNER JOIN user u
ON it.user_id = u.id
WHERE user_id = " . $_COOKIE["login_id"];
$sell_item = mysqli_query($link,$query_sell);
mysqli_close($link);
require_once "../view/my_page_sell.php";
?>