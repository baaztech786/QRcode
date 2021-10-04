<?php
/*
************************** File for Logout Code
*/
include 'config/config.php';
include 'functions.php';
session_destroy();
header('Location: login.php');
?>