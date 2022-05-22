<?php

if (!isset($_POST["submitbutton"])){
    header("location: ../otherpages/annunci.php");
    exit();
}

//INIZIALIZZA VARIABILI DEL FORM

session_start();
$username=$_SESSION["username"];
include_once("../profileutility/profile-data.php");
$luogo=$_POST["luogo"];
$descrizione=$_POST["descrizione"];
$data=$_POST["data"];

//CONNESSIONE AL DATABASE

require_once '../login-signup/dbh.inc.php';

//FUNZIONI VARIE PER IL LOGIN-SIGNUP/PROFILE DATABASE

require_once '../login-signup/functions.inc.php';

publishAnnuncio($conn,$username,$genere,$luogo,$descrizione,$data);

header("location: ../otherpages/annunci.php");
exit();