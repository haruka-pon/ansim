<?php
setcookie("login_id","",time() - 60 * 1);
header("location: home.php");
?>