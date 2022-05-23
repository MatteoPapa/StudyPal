<?php

if (!isset($_POST["submitbutton"])){
    header("location: ../otherpages/profile.php");
    exit();
}

//INIZIALIZZA VARIABILI DEL FORM

session_start();
$genere=$_POST["genere"];
$studente=$_POST["studente"];


if ($_POST["studente"]=="liceale"){
    $facolta=$_POST["indirizzo"];
}
else if ($_POST["studente"]=="universitario"){
    $facolta=$_POST["facolta"];
}
else{
    $facolta="";
}

$biografia=ucfirst($_POST["biografia"]);
$nome=ucfirst($_POST["nome"]);
$cognome=ucfirst($_POST["cognome"]);

//CONNESSIONE AL DATABASE

require_once '../../login-signup/dbh.inc.php';

//FUNZIONI VARIE PER IL LOGIN-SIGNUP/PROFILE DATABASE

require_once '../../login-signup/functions.inc.php';


modifyDatabase($conn,$_SESSION["username"],$genere,$studente,$facolta,$biografia,$nome,$cognome);

header("location: ../../otherpages/profile.php");
exit();