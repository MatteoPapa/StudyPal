<!DOCTYPE html>
<html>
    <head>
        <title>Registrati</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    
        <!--Bootsrap 4 CDN-->

        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <!------ Include the above in your HEAD tag ---------->
        <!--Custom styles-->
        <link rel="stylesheet" type="text/css" href="../css/signform.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
    </head>
    <body>
        <div class="backcontainer">
            <div class="blur d-flex flex-column">
                <a class="logo" href="../index.php">
                    <img  src="../media/StudyPalLogo.png" alt="StudyPalLogo">
                </a>

                <section class="signup">

                    <div class="container">

                        <div class="signup-content">

                            <div class="signup-form">
                                <h2 class="form-title">Registrati</h2>

                                <!-- INIZIO FORM SIGNUP -->
                                <form action="signup.inc.php" name="signupForm" method="POST" class="register-form" id="register-form" onSubmit="return validaForm()">

                                    <div class="form-group">
                                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input type="text" name="name" id="name" placeholder="Username" required autofocus/>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                                        <input type="email" name="email" id="email" placeholder="Email" required/>

                                        

                                    </div>

                                    <div class="form-group">
                                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="pass" id="pass" placeholder="Password" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                        <input type="password" name="re_pass" id="re_pass" placeholder="Conferma password" required/>
                                    </div>

                                    <!-- GESTIONE ERRORI -->

                                    <?php
                                        if (isset($_GET["error"])){
                                            if ($_GET["error"]=="invalidemail"){
                                                echo "<p style='color:red'>Email non valida</p>";
                                            }
                                            if ($_GET["error"]=="usertaken"){
                                                echo "<p style='color:red'>Email o Username già registrati</p>";
                                            }
                                            if ($_GET["error"]=="stmtfailed"){
                                                echo "<p style='color:red'>Qualcosa è andato storto, riprova</p>";
                                            }
                                            if ($_GET["error"]=="none"){
                                                echo "<a href='login.php' style='color:green'>Registrazione eseguita con successo ! Clicca qui per eseguire il login</a>";
                                            }
                                        }
                                    
                                    ?>






                                    <div class="form-group form-button">
                                        <input type="submit" name="signupbtn" id="signup" class="form-submit" value="Registrati"/>
                                    </div>
                                    
                                </form>
                                <!-- FINE FORM SIGNUP -->

                            </div>

                            <div class="signup-image">
                                <figure><img id="signimg" src="../media/signup-image.jpg" alt="sign-up image"></figure>
                                <a href="login.php" style="text-decoration: underline" class="signup-image-link">Ho già un account</a>
                            </div>
                            
                        </div>

                    </div>

                </section>

            </div>
        </div>
        <script src="valide.js"></script>
    </body>
</html>


<!--
COMANDO SQL PER AZZERARE ID DEL DATABASE

SET @num := 0;
UPDATE users SET id = @num := (@num+1);
ALTER TABLE users AUTO_INCREMENT =1;

-->