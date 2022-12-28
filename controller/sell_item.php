<?php
require_once "../../const.php";
require_once "../model/func.php";

//DB接続
$link = connect_db(HOST,USER_ID,PASSWORD,DB_NAME);
if($link == false){
    //接続エラー
    header("location: error.php?error=connecting_to_db_server_has_faild");
    exit;
}

//出品ボタンが押されたとき
if(isset($_POST["state"]) && $_POST["state"] == "sell"){
    $name = escape($link,$_POST["name"]);
    $price = escape($link,$_POST["price"]);
    $category_id = escape($link,$_POST["category_id"]);
    $discription = escape($link,$_POST["discription"]);
    $item_condition_id = escape($link,$_POST["item_condition_id"]);
    $who_pays_fee = escape($link,$_POST["who_pays_fee"]);
    $inspection_id = escape($link,$_POST["inspection_id"]);
    $pickup_id = escape($link,$_POST["pickup_id"]);
    $img = "";
    $i = 1;
    foreach($_FILES as  $file){
        $extension = get_extension($file["name"]);
        if($file["error"] == 0){
            $img = $img . $i . "." . $extension . "/";
            $i ++;
        }
    }
    $img = trim($img,"/");
    $img = escape($link,$img);
    $query = "INSERT INTO item (user_id,name, price, category_id, discription, item_condition_id, who_pays_fee, inspection_id, pickup_id,img)
    VALUES (" . $_COOKIE["login_id"] . ",'" . $name . "'," . $price . "," . $category_id . ",'" . $discription . "'," . $item_condition_id . "," . $who_pays_fee . "," . $inspection_id . "," . $pickup_id . ",'" . $img ."')";

    $result = mysqli_query($link,$query);
    if($result == false){
        //接続エラー
        mysqli_close($link);
        header("location: error.php?error=追加失敗");
        exit;
    }
    $item_id = mysqli_insert_id($link);
    mkdir("../../ansim_user/". $_COOKIE["login_id"] . "/item/" . $item_id);
    $i = 1;
    foreach($_FILES as  $file){
        if($file["error"] == 0){
            $extension = get_extension($file["name"]);
            move_uploaded_file($file["tmp_name"],"../../ansim_user/". $_COOKIE["login_id"] . "/item/" . $item_id . "/" . $i . "." . $extension);
            $i ++;
        }
    }
    mysqli_close($link);
    header("location: sell_item_complete.php?id=" . $item_id);
    exit;
}

/////////オプション取得//////////
$query = "SELECT * FROM category";
$category = get_option_data($query,$link);
$query = "SELECT * FROM item_condition";
$item_condition = get_option_data($query,$link);
$query = "SELECT * FROM pickup";
$pickup = get_option_data($query,$link);
$query = "SELECT * FROM inspection";
$inspection = get_option_data($query,$link);
$query = "SELECT * FROM who_pays_fee";
$who_pays_fee = get_option_data($query,$link);
mysqli_close($link);

require_once "../view/sell_item.php";
?>