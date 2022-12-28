<?php
require_once "../../const.php";
require_once "../model/func.php";
session_start();

$check = [
    ["name","氏名",["required"]],
    ["user_name","ユーザー名",["required"]],
    ["email","メールアドレス",["required","email"]],
    ["password","パスワード",["required"]],
    ["post_number","郵便番号",["required"]],
    ["address","住所",["required"]],
    ["tel","電話番号",["required","natural_num"]],
];
$data = vld_ini($check);
//確認画面から修正ボタンで戻った時
if(isset($_SESSION["state"]) && $_SESSION["state"] == "sign_up_back"){
    $data = $_SESSION["sign_up_data"];
}
//確認ボタンが押されていないとき
if(!isset($_REQUEST["submit"]) || $_REQUEST["submit"] !== "confirm"){
    require_once "../view/sign_up.php";
    exit;
}
$data = form_vld($check);
foreach($data as $vld){
    if($vld["vld"] == "invalid"){
        require_once "../view/sign_up.php";
        exit;
    }
}
$_SESSION["sign_up_data"] = $data;
$_SESSION["state"] = "sign_up_confirm";
header("location: sign_up_confirm.php");
?>