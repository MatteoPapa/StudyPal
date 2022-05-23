<?php
    $idannuncio=$_POST["idannunciopost"];

    //CONNESSIONE AL DATABASE

    require_once '../../login-signup/dbh.inc.php';

    //FUNZIONI VARIE PER IL LIKE

    require_once '../../login-signup/functions.inc.php';

    deleteAnnuncio($conn,$idannuncio);
    