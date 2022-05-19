
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- BASE FOLDER --> 
    <base href="http://localhost/proveSito/">


    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
		
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="old stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/custom.css">
    
    <!-- Title -->
    <title>StudyPal</title>
    <link rel="shortcut icon" type="image/png" href="media/logo48x48.png"/>
  </head>
  <body>
    
    <!--CHECK LOGIN E PROFILO MANCANTE-->


    <header id="header" class="text-white">
        <div class="headerbackground p-2">
            <div class="container">
                <div class="d-flex flex-wrap py-2">
                    
                    <!-- TASTO PER APRIRE NAVBAR-->

                    <div id='menuicon' class="col-6 px-2" >
                        <a id="menudropdown" onclick="openNav()" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </a>
                    </div>
                    
                    <ul id="navigatorbar" class="nav col-6 mb-md-0 text-left px-5">
                        <li><a href="index.php" class="nav-link px-2">Home</a></li>
                        <li><a href="otherpages/compagni.php" class="nav-link px-2">Compagni</a></li>
                        <li><a href="otherpages/annunci.php" class="nav-link px-2">Annunci</a></li>
                        <li><a href="#about" class="nav-link px-2">Info</a></li>
                    </ul>

                    <!-- PHP PER BOTTONI LOG IN, SIGNUP PROFILE, LOGOUT-->
                    <?php
                        if (isset($_SESSION["username"])){
                            echo '<span class="loginbuttons text-end col-6">
                                
                                <a href="otherpages/profile.php">
                                    <button type="button" class="btn btn-warning me-2 ">Profilo</button>
                                </a>
                                <a href="login-signup/logout.inc.php">
                                    <button type="button" id="logbut" class="btn logbutton btn-dark ">Log Out</button>
                                </a>
                            </span>';
                        }
                        else{
                            echo '<span class="loginbuttons text-end col-6">
                                <a href="login-signup/login.php">
                                    <button type="button" id="logbut" class="btn logbutton btn-dark me-2 ">Login</button>
                                </a>
                                <a href="login-signup/signup.php">
                                    <button type="button" class="btn btn-warning">Sign-up</button>
                                </a>
                            </span>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#" onclick="closeNav()">Home</a>
            <a href="otherpages/compagni.php">Compagni</a>
            <a href="otherpages/annunci.php">Annunci</a>
            <a href="#about" onclick="closeNav()">Info</a>
    </div>
