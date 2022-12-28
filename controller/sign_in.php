<?php
require_once "../../const.php";
require_once "../model/func.php";
$err = "";
//ログイン
if(isset($_REQUEST["state"]) && $_REQUEST["state"] == "login"){
    //db接続
    $link = connect_db(HOST,USER_ID,PASSWORD,DB_NAME);
    if($link == false){
        //接続エラー
        header("location: error.php?error=connecting_to_db_server_has_faild");
        exit;
    }
    //認証
    $query = "SELECT id
    FROM user
    WHERE email='" . $_REQUEST["email"] . "' && password='" . $_REQUEST["password"] . "'";
    $result = mysqli_query($link,$query);
    if($result == false){
        //実行エラー
        mysqli_close($link);
        header("location: error.php?error=db_query_has_failed");
        exit;
    }elseif($result->num_rows == 0){
        mysqli_close($link);
        $err = "メールアドレス又はパスワードが間違っています。";
        require_once "../view/sign_in.php";
        exit;
    }
    $expire = time() + (60 * 60 * 24 * 14);
    setcookie("login_id",mysqli_fetch_assoc($result)["id"],$expire);
    mysqli_close($link);
    header("location: home.php");
    exit;
}
require_once "../view/sign_in.php";
?>