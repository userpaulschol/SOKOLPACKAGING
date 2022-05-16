<?php

session_start();

require 'api.php';
if(empty($_GET['email'])) {
    echo "<script>window.location = 'login.php';</script>";
    exit();
}
?>