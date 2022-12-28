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

//ユーザーidを取得する
// $user_id = $_SESSION[""];
// $query = "
// SELECT *
// FROM user
// WHERE id = " . $user_id . "
// ";
if(isset($_POST['button']) && $_POST['button'] == 'back'){
    header("location: my_page.php");
    exit;
}


// user　DB取得
$query = "SELECT * FROM user WHERE id = " . $_COOKIE["login_id"];
$user = mysqli_fetch_assoc(mysqli_query($link,$query));

if(isset($_POST['button']) && $_POST['button'] == 'updata'){

    $query_img = "UPDATE user SET icon_img = 'icon.jpg' WHERE id = '". $_COOKIE["login_id"] ."'";
    // var_dump($query_img);
    $result = mysqli_query($link,$query_img);
    if($result == false){
        //接続エラー
        mysqli_close($link);
        header("location: error.php?error=変更失敗" );
        exit;
    }

    foreach($_FILES as  $file){
        if($file["error"] == 0){
            move_uploaded_file($file["tmp_name"],"../../ansim_user/". $_COOKIE["login_id"] . "/icon.jpg");
        }
    }
    mysqli_close($link);
    header("location: my_page.php");
    exit;
}
require_once "../view/profile.php";
?>