<?php
    $liker=$_POST["likerpost"];
    $idannuncio=$_POST["idannunciopost"];

    //CONNESSIONE AL DATABASE

    require_once '../login-signup/dbh.inc.php';

    //FUNZIONI VARIE PER IL LIKE

    require_once '../login-signup/functions.inc.php';

    $liked=checkLike($conn,$idannuncio,$liker);

    if ($liked){
        deleteLike($conn,$idannuncio,$liker);
    }
    else{
        putLike($conn,$idannuncio,$liker);
    }