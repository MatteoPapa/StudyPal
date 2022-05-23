<?php

//VERIFICA SE IL FORMATO DELL'EMAIL E' CORRETTO

function invalidEmail($email) {
    $result=false;

    //FUNZIONE PHP: True se l'email è valida

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}


//VERIFICA SE L'USER E' GIA' NEL DATABASE

function userAlreadyExists($conn,$username,$email) {
    
    //PREPARAZIONE DELLA QUERY SQL

    $sql= "SELECT * FROM users WHERE username= ? OR email=?;";

    //NON INSERIAMO I DATI DIRETTAMENTE NELLA QUERY (PER EVITARE INJECTION)
    //INVECE PREPARIAMO UNO STATEMENT "CONTROLLATO"

    $stmt = mysqli_stmt_init($conn); //INIZIALIZZAZIONE STATEMENT


    if (!mysqli_stmt_prepare($stmt,$sql)){ //PREPARIAMO LO STATEMENT E CONTROLLIAMO ERRORI
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    //COLLEGHIAMO I PARAMETRI ALLO STATEMENT
    //"ss" STA PER (STRING,STRING), OVVERO LA TIPOLOGIA DI DATI CHE STIAMO PASSANDO ALLA FUNZIONE

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);

    //ESEGUIAMO LA QUERY

    mysqli_stmt_execute($stmt);

    $resultData= mysqli_stmt_get_result($stmt);

    //SE C'E' QUALCOSA NEL DATABASE, 
    //LA RESTITUISCE (E SARA' COMUNQUE DIVERSO DA FALSE IL RISULTATO)
    if ($row=mysqli_fetch_assoc($resultData)){
        return $row;
    }

    //SE NON C'E'
    else{
        $result=false;
        return $result;
    }

    //CHIUDIAMO LO STATEMENT

    mysqli_stmt_close($stmt);
}


//CREAZIONE UTENTE (FUNZIONA IN MODO SIMILE ALLA PRECEDENTE)

function createUser($conn,$username,$email,$pwd) {
    
    //PREPARAZIONE DELLA QUERY SQL

    $sql= "INSERT INTO users (username,email,password) VALUE (?,?,?) ;";

    //PREPARIAMO UNO STATEMENT "CONTROLLATO"

    $stmt = mysqli_stmt_init($conn); 


    if (!mysqli_stmt_prepare($stmt,$sql)){ //PREPARIAMO LO STATEMENT E CONTROLLIAMO ERRORI
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    //PRIMA DEL BIND, CRITTOGRAFIAMO LA PASSWORD CON password_hash(),
    // UNA FUNZIONE CHE E' COSTANTEMENTE AGGIORNATA NEL TEMPO

    $pwdHashed= password_hash($pwd,PASSWORD_DEFAULT);

    //COLLEGHIAMO I PARAMETRI ALLO STATEMENT
    //"sss" STA PER (STRING,STRING,STRING), OVVERO LA TIPOLOGIA DI DATI CHE STIAMO PASSANDO ALLA FUNZIONE
    
    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$pwdHashed);

    //ESEGUIAMO LA QUERY
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: signup.php?error=none");
    exit();
}

//CREAZIONE PROFILO

function createProfile($conn,$username,$email,$genere,$studente,$facolta,$biografia,$nome,$cognome) {
    
    //PREPARAZIONE DELLA QUERY SQL

    $sql= "INSERT INTO profile (username,email,genere,studente,facolta,biografia,nome,cognome) VALUE (?,?,?,?,?,?,?,?) ;";

    //PREPARIAMO UNO STATEMENT "CONTROLLATO"

    $stmt = mysqli_stmt_init($conn); 


    if (!mysqli_stmt_prepare($stmt,$sql)){ //PREPARIAMO LO STATEMENT E CONTROLLIAMO ERRORI
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    //COLLEGHIAMO I PARAMETRI ALLO STATEMENT
    
    mysqli_stmt_bind_param($stmt,"ssssssss",$username,$email,$genere,$studente,$facolta,$biografia,$nome,$cognome);

    //ESEGUIAMO LA QUERY
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}

function loginUser($conn,$email,$pwd){

    //CONTROLLA SE L'UTENTE E' NEL DATABASE 
    //Inseriamo due volte la variabile $email, visto che potrebbe essere sia l'username che l'email

    $userExists= userAlreadyExists($conn,$email,$email);

    //SE NON C'E':

    if ($userExists === false){
        header("location: login.php?error=wronglogin");
        exit();
    }

    //CONTROLLO PASSWORD

    $pwdHashed= $userExists["password"];
    $checkPwd= password_verify($pwd,$pwdHashed);

    if ($checkPwd === false){
        header("location: login.php?error=wrongpassword");
        exit();
    }

    else if ($checkPwd === true){

        //LOG IN UTENTE

        session_start();
        $_SESSION["userId"]=$userExists["id"];
        $_SESSION["username"]=$userExists["username"];
        $_SESSION["email"]=$userExists["email"];

        require_once("../utility/profileutility/profile-data.php");
        
        if ($genere=="maschio" || $genere=="femmina"){
            header("location: ../index.php");
            exit();
        }
        else{
            header("location: ../otherpages/profile.php?mode=edit");
            exit();
        }
    }

}


function modifyDatabase($conn,$username,$genere,$studente,$facolta,$biografia,$nome,$cognome){

    $sql = "UPDATE profile SET genere=?,studente=?,facolta=?,biografia=?,nome=?,cognome=? WHERE username= ?;";

    //PREPARIAMO UNO STATEMENT "CONTROLLATO"
    if ($biografia==""){
        header("location: ../index.php");
        exit();
    }
    $stmt = mysqli_stmt_init($conn); 


    if (!mysqli_stmt_prepare($stmt,$sql)){ //PREPARIAMO LO STATEMENT E CONTROLLIAMO ERRORI
        header("location: profile.php?error=stmtfailed");
        exit();
    }
     
    //BIND PARAMETRI
    
    mysqli_stmt_bind_param($stmt,"sssssss",$genere,$studente,$facolta,$biografia,$nome,$cognome,$username);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}
    
function publishAnnuncio($conn,$username,$genere,$luogo,$descrizione,$data,$time){

    $sql = "INSERT INTO annunci (username,genere,luogo,descrizione,data,orario) VALUE (?,?,?,?,?,?)";

    
    $stmt = mysqli_stmt_init($conn); 


    if (!mysqli_stmt_prepare($stmt,$sql)){ //PREPARIAMO LO STATEMENT E CONTROLLIAMO ERRORI
        header("location: profile.php?error=stmtfailed");
        exit();
    }
     
    //BIND PARAMETRI
    
    mysqli_stmt_bind_param($stmt,"ssssss",$username,$genere,$luogo,$descrizione,$data,$time);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}

function deleteAnnuncio($conn,$idannuncio){
    $sql = "DELETE FROM annunci where (id='$idannuncio')";
    $sql2 = "DELETE FROM likes where (idannuncio='$idannuncio')";
    
    if ($conn->query($sql)!= TRUE || $conn->query($sql2)!= TRUE){
        exit();
    }
}


//LIKE MANAGER

function checkLike($conn,$idannuncio,$liker){
     //IS IT LIKED FROM YOU ?
     $sql= "SELECT count(*) as num_rows FROM likes WHERE (liker='$liker' and idannuncio='$idannuncio')";
     $liked=mysqli_query($conn,$sql);
     $row=mysqli_fetch_array($liked);
     
     if ($row["num_rows"] > 0) return true;
     else return false;
}

function putLike($conn,$idannuncio,$liker){
    $sql = "INSERT INTO likes (idannuncio,liker) VALUE (?,?)";

    
    $stmt = mysqli_stmt_init($conn); 


    if (!mysqli_stmt_prepare($stmt,$sql)){ //PREPARIAMO LO STATEMENT E CONTROLLIAMO ERRORI
        header("location: profile.php?error=stmtfailed");
        exit();
    }
        
    //BIND PARAMETRI
    
    mysqli_stmt_bind_param($stmt,"is",$idannuncio,$liker);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    exit();
}

function deleteLike($conn,$idannuncio,$liker){
    $sql = "DELETE FROM likes where (idannuncio='$idannuncio' and liker='$liker')";
    
    if ($conn->query($sql)!= TRUE){
        exit();
    }
}

