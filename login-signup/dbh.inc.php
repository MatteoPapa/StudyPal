<?php

//CREA LA CONNESSIONE AL DATABASE

$serverName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="studypaldb";

$conn=mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

//SE LA CONNESSIONE FALLISCE: 

if (!$conn){
    die("Connessione a MYSQL fallita: " . mysqli_connect_error());
}