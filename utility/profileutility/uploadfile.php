<?php
    session_start();
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    
    $username=$_SESSION["username"];
    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"]; 

    //NOME CUSTOM PER IL FILE
    $extension = substr($filename, strpos($filename, ".") + 1);    
    $finalname = $username ."pic." .$extension;
    $folder = "../../media/profilepics/".$username ."pic." . $extension;
    
    //FUNZIONE CHE VERIFICA SE E' UN'IMMAGINE
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $tempname);
    if (!($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/gif' || $mimetype == 'image/png')) {
        header("location: ../../otherpages/profile.php");
        exit();
    }

    require_once("../../login-signup/dbh.inc.php");

    //CONTROLLIAMO SE GIA' ESISTE UNA PICTURE CON QUELNOME
    $sql = "SELECT picture from profile WHERE username='$username'";

    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
     
    //ELIMINA VECCHIE FOTO DEL PROFILO DALLA CARTELLA
    if ($row["picture"]!=""){
        $file_to_delete = "../../media/profilepics/".$row["picture"];
        unlink($file_to_delete);
    }

    //INSERIMENTO FILE NAME NEL DATABASE
    $sql = "UPDATE profile SET picture=? WHERE username= ?";


    $stmt = mysqli_stmt_init($conn); 

    if (!mysqli_stmt_prepare($stmt,$sql)){ 
        header("location: profile.php?error=stmtfailed");
        exit();
    }
     
    //BIND PARAMETRI
    
    mysqli_stmt_bind_param($stmt,"ss",$finalname,$username);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    //SPOSTIAMO L'IMMAGINE NELLA CARTELLA DELLE IMMAGINI
    if (move_uploaded_file($tempname, $folder))  {
        header("location: ../../otherpages/profile.php?mode=edit");
    }else{
        echo "Failed to upload image";
    }
  }

?>