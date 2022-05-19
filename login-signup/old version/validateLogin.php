<?php

if (!(isset($_POST['signin']))) {
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

                $email = $_POST['your_name'];
                $q1 = "select * from users where email= '" . $email ."'";

                $result= $mysqli-> query($q1);

                if (!($row = $result->fetch_array(MYSQLI_ASSOC))) {
                    echo "<h1>Non sei ancora registrato !</h1>
                        <a href=../registrazione/index.html> 
                            Click here to register
                        </a>";
                }
                else {
                    $password = md5($_POST['your_pass']);

                    $q2 = "select * from users where email = '$email' and password = '$password'";
                    
                    $result= $mysqli-> query($q2);

                    if (!($row = $result->fetch_array(MYSQLI_ASSOC))) {
                        echo "<h1>Password errata !</h1>
                            <a href=../registrazione/index.html> 
                                Click here to register
                            </a>";
                    }

                    else {
                        
                        session_start();
                        $_SESSION["username"]=
                    }
                }
        ?> 
    </body>
</html>
