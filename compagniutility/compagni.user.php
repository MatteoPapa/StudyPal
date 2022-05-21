<?php
    session_start();

    $usernameStringed= "'" . $_SESSION["username"] . "'";

    //CONTROLLA SE QUALCUNO E' LOGGATO DENTRO
    
    if (!isset($_SESSION['username'])){
        header("location: ../index.php");
        exit();
    }

    //CONTROLLA SE IL PROFILO DI UNA PERSONA LOGGATA E' CONFIGURATO
    if (isset($_SESSION["username"])){
        include_once("../profileutility/profile-data.php");
            if ($genere=="" && $_GET["mode"]!=="edit"){
                header("location: profile.php?mode=edit");
                exit();
            }
      }
    
    
?>



    <?php
        ob_start();
        include("../usualelements/header.php");
        $buffer=ob_get_contents();
        ob_end_clean();
    
        $buffer=str_replace("%TITLE%","StudyPal - Compagni",$buffer);
        echo $buffer;

        require_once("../compagniutility/account-data.php");
    ?>

    
    <main id="main" class="py-4">
        
        <div id="profilecontainer">
            <div class="container rounded bg-white mb-5 ">
                <div id="avatardiv" class="row d-flex justify-content-center">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 pt-5">'

                        <img class="rounded-circle mt-2 mb-2 " id="avatarimage" width="150px" height="150px" 
                            <?php
                                if ($genere !== "femmina"){
                                    echo 'src="media/avatar-male.jpg"';
                                }
                                else{
                                    echo 'src="media/avatar-female.jpg"';
                                }
                            ?>
                        />
                        <span class="font-weight-bold"><b><?php echo $_GET["user"] ?></b></span>
                        <span style="font-weight: 300px"><?php echo $email ?></span>
                        <span> </span>
                            <div id="backhistory-user" class="backhistory-user" >
                                <a href="otherpages/compagni.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle my-5" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                                    </svg>
                                    <span class="mx-3">Compagni</span>
                                </a>
                            </div>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="px-3 py-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right"><b>Informazioni Utente</b></h4>    
                        </div>

                            <div class="row mt-1">
                                <div class="col-md-12 py-2"><b>Genere</b><br>
                                    <div id="generediv" class="py-2">
                                        <?php
                                            if ($genere=="maschio"){
                                                echo '<label class="labels px-1">Maschio</label>';
                                            }
                                            else if ($genere=="femmina"){
                                                echo '<label class="labels px-1">Femmina</label>';
                                            }
                                            else{
                                                echo '<label class="labels px-1">-</label>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6 py-2"><b>Nome</b>
                                    <div id="nomediv" class="py-2">
                                        <?php
                                            if ($nome==""){
                                                echo '<label class="labels px-1">-</label>';
                                            }
                                            else{
                                                echo '<label class="labels px-1">' . $nome.  '</label>';
                                            }
                                            
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6 py-2"><b>Cognome</b>
                                    <div id="cognomediv" class="py-2">
                                        <?php
                                            if ($cognome==""){
                                                echo '<label class="labels px-1">-</label>';
                                            }
                                            else{
                                                echo '<label class="labels px-1">' . $cognome.  '</label>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-12 py-2"><b>Studente</b><br>
                                    <div class="py-2">
                                        <?php
                                            if ($studente=="universitario"){
                                                echo '<label class="labels px-1">Universitario</label>';
                                            }
                                            else if ($studente=="liceale"){
                                                echo '<label class="labels px-1">Liceale</label>';
                                            }
                                            else{
                                                echo '<label class="labels px-1">-</label>';
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-12 py-2">
                                    <?php
                                        if ($studente=="liceale"){
                                            echo ' <div id="indirizzodiv">
                                                <b>Indirizzo</b><br>';
                                            echo '<label class="labels py-2 px-1">' . $facolta . '</label>';
                                            echo ' </div>';
                                        }
                                        else if ($studente=="universitario"){
                                            echo '<div id="facoltadiv">
                                                <b>Facoltà</b><br>';
                                            echo '<label class="labels py-2 px-1">' . $facolta . '</label>';
                                            echo '</div>';
                                        }
                                        else{
                                            
                                        }
                                    ?>
                                </div>
                                <div class="col-md-12 py-2"><b>Biografia</b>
                                    <div id="biografiadiv" class="py-2">
                                        <?php
                                            if ($biografia==""){
                                                echo '<label class="labels px-1">-</label>';
                                            }
                                            else{
                                                echo '<label class="labels px-1">' . $biografia.  '</label>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column justify-content-start mx-0 px-0">
                                <div class="mt-5">
                                    <a target="_blank" href="mailto:"<?=$email?>>
                                        <button id="editbutton" class="btn btn-primary profile-button" type="button">Contatta <?=$_GET["user"]?></button>
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>
            
            </div>
        </div>
    </main >

    <?php
        
        include_once("../usualelements/footer.php");
    ?>
