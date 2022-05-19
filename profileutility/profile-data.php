<?php
    //CONNESSIONE AL DATABASE
    require_once("../login-signup/dbh.inc.php");

    $username=$_SESSION["username"];
    $email=$_SESSION["email"];


    $sql= "SELECT * FROM profile WHERE username='$username'";
    $result= mysqli_query($conn,$sql);

    if ($row=mysqli_fetch_assoc($result)){
        $genere= $row["genere"];
        $studente= $row["studente"];
        $facolta= $row["facolta"];
        $biografia=$row["biografia"];
        $nome=$row["nome"];
        $cognome=$row["cognome"];
    }
    else{
        header("location: ../login-signup/signup.php");
        exit();
    }
?>