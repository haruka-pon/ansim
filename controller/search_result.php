<?php
require_once "../../const.php";
require_once "../model/func.php";

//DB接続
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
if($link == false){
    //接続エラー
    header("location: error.php?error=connecting_to_db_server_has_faild");
    exit;
}

$query = "SELECT * FROM category ";
$categories = mysqli_query($link,$query);
if($categories == false){
    //実行エラー
    mysqli_close($link);
    header("location: error.php?error=connecting_to_db_server_has_faild");
    exit;
}

// $query = "SELECT * FROM item ";
if(isset($_GET['category_id'])){
    // $query .= "WHERE category_id = " . $_GET['category_id'] . " ";
    $query = "SELECT it.*,u.prime_status FROM item it
    INNER JOIN user u
    ON it.user_id = u.id
    WHERE category_id = " . $_GET['category_id'] . " ";
}
if(isset($_GET['search_result'])){
    // $query .= "WHERE name LIKE '" . $_GET['search_result'] . "%' ";
    $query = "SELECT it.*, u.prime_status FROM item it
    INNER JOIN user u
    ON it.user_id = u.id
    WHERE name LIKE '" . $_GET['search_result'] . "%' ";
}
if(isset($_POST['search_btn'])){
    // $query .= "it
    $query = "SELECT it.*,u.prime_status FROM item it
    INNER JOIN user u
    ON it.user_id = u.id
    WHERE category_id = '" . $_POST['selected_category'] . "' ";
    if($_POST['inspection'] == 'need'){
        $query .= "AND inspection_id = 2 ";
    }elseif($_POST['inspection'] == 'not'){
        $query .= "AND inspection_id = 1 ";
    }
    if($_POST['prime'] == 'member'){
        $query .= "AND u.prime_status = 1 ";
    }elseif($_POST['prime'] == 'not_member'){
        $query .= "AND u.prime_status IS NULL ";
    }
}

$list = mysqli_query($link,$query);

if($list == false){
    //実行エラー
    mysqli_close($link);
    header("location: error.php?error=connecting_to_db_server_has_faild");
    exit;
}

mysqli_close($link);

require_once "../view/search_result.php";
?>