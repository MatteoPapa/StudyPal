<?php
    //CONNESSIONE AL DATABASE
    $diruptwo=dirname(__DIR__,2);
    require_once($diruptwo."\login-signup\dbh.inc.php");

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
        $picture=$row["picture"];
    }
    else{
        header("location: ../login-signup/signup.php");
        exit();
    }
?>