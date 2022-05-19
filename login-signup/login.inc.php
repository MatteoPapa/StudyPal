<?php


if (!isset($_POST["signinbtn"])){
    header("location: login.php");
    exit();
}

$username=$_POST["your_name"];
$pwd=$_POST["your_pass"];

require_once 'dbh.inc.php';

require_once 'functions.inc.php';

loginUser($conn, $username, $pwd);

