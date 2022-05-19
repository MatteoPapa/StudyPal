<?php

if (!isset($_POST["signupbtn"])){
    header("location: signup.php");
    exit();
}

//INIZIALIZZA VARIABILI DEL FORM


$username=$_POST["name"];
$email=$_POST["email"];
$pwd=$_POST["pass"];
$pwdRepeat=$_POST["re_pass"];

//CONNESSIONE AL DATABASE
require_once 'dbh.inc.php';

//FUNZIONI VARIE PER IL LOGIN-SIGNUP
require_once 'functions.inc.php';


//CONTROLLI SIGNUP CON FUNZIONI PHP 

if (invalidEmail($email) !== false){
    header("location: signup.php?error=invalidemail");
    exit();
}


if (userAlreadyExists($conn,$username,$email) !== false){
    header("location: signup.php?error=usertaken");
    exit();
}

createProfile($conn,$username,$email,"","","","","","");

createUser($conn,$username,$email,$pwd);
