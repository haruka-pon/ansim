<?php
require_once "../model/func.php";
require_once "../../const.php";
if(!isset($_GET["error"])){
    header("location: home.php");
    exit;
}
require_once "../view/error.php";
?>