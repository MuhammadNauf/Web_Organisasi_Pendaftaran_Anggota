<?php
session_start();
unset($_SESSION["logged_in"]);
unset($_SESSION["last_activity"]);
unset($_SESSION["expire_time"]);
unset($_SESSION["user_id"]);
header("Location:login.php");
?>