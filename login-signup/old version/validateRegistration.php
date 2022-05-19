
<?php

function EchoMessage($msg){
    echo '<script type="text/javascript">
    alert("' . $msg . '")
    history.back();
    </script>';
}

if (!(isset($_POST['signup']))) {
    header("Location: /");
}

else {
    $mysqli = new mysqli("localhost","root","","users");

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
}

?>


<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php   
                $controllo=true;
                //EMAIL GIA' ESISTENTE
                
                $email = $_POST['email'];
                
                $q1="select * from users where email= '" . $email . "'";
                $result= $mysqli-> query($q1);

                

                if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    //echoMessage("Email già registrata !");
                    header("Location: signup.php?error=emailtaken");
                    $controllo=false;
                }

                //USERNAME GIA' ESISTENTE
                $username = $_POST['name'];


                $q2="select * from users where username= '" . $username . "'";
                $result= $mysqli-> query($q2);


                if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    header("Location: signup.php?error=usertaken");
                    $controllo=false;
                }

                
                
                
                if ($controllo){

                    $email = $_POST['email'];
                    $password = md5($_POST['pass']);

                    $q3 = "INSERT INTO users (username, email,password)
                    VALUES ('$username', '$email', '$password')";

                    if ($mysqli-> query($q3)) {
                        echo "<h1> Registration is completed. 
                            Start using the website <br/></h1>";
                        echo "<a href=../Welcome.php?name=$username> Premi qui </a>
                            per inziare ad utilizzare il sito web";
                    }
                }
        ?> 
    </body>
</html>

<!--SET @num := 0;
UPDATE users SET id = @num := (@num+1);
ALTER TABLE users AUTO_INCREMENT =1;-->