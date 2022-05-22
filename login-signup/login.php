<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="shortcut icon" type="image/png" href="../media/logo48x48.png"/>

        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    
        <!--Bootsrap 4 CDN-->

        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        
        <!--Roboto CDN-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <!--Custom styles-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="../css/signform.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">

        
    </head>
    <body>
        
        <div class="backcontainer">

            <div class="blur d-flex flex-column">

                <a class="logo" href="../index.php">
                    <img  src="../media/StudyPalLogo.png" alt="StudyPalLogo">
                </a>

                <section class="sign-in">

                    <div class="container">

                        <div class="signin-content">

                            <div class="signin-image row col-xs-12 visible-xs visible-sm">
                                <figure><img id="logimg" src="../media/signin-image.jpg" alt="log in image"></figure>
                                <a href="signup.php" class="signup-image-link">Non hai ancora un account?</a>
                            </div>

                            <div class="signin-form row col-xs-12 visible-xs visible-sm">
                                <h2 class="form-title">Accedi</h2>

                                <!-- INIZIO FORM LOGIN -->
                                <form action="login.inc.php" method="POST" class="register-form" id="login-form" onSubmit="">
                                    <div class="form-group">
                                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input type="text" name="your_name" id="your_name" placeholder="Email/Username" required autofocus/>
                                    </div>
                                    <div class="form-group">
                                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="your_pass" id="your_pass" placeholder="Password" required/>
                                    </div>

                                    <?php
                                        if (isset($_GET["error"])){
                                            if ($_GET["error"]=="wronglogin"){
                                                echo "<p style='color:red'>Utente non registrato</p>";
                                            }
                                            if ($_GET["error"]=="wrongpassword"){
                                                echo "<p style='color:red'>Password incorretta</p>";
                                            }
                                        }
                                    ?>

                                    <div class="form-group form-button">
                                        <input type="submit" name="signinbtn" id="signin" class="form-submit" value="Log in"/>
                                    </div>
                                </form>
                                <!-- FINE FORM LOGIN -->

                            </div>

                        </div>

                    </div>

                </section>
            </div>
        </div>
        
    </body>
    </html>