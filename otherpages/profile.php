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
        include_once("../utility/profileutility/profile-data.php");
            if ($genere=="" && $_GET["mode"]!=="new"){
                header("location: profile.php?mode=new");
                exit();
            }
      }
    
    
?>



    <?php
        ob_start();
        include("../usualelements/header.php");
        $buffer=ob_get_contents();
        ob_end_clean();
    
        $buffer=str_replace("%TITLE%","StudyPal - Profile",$buffer);
        echo $buffer;

        require_once("../utility/profileutility/profile-data.php");
    ?>

    
    <main id="main">
        
        <div id="profilecontainer">
            
            <div class="container rounded bg-white mt-1 mb-5 ">
                <div id="avatardiv" class="row d-flex justify-content-center">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle" id="avatarimage" width="150px" height="150px"<?php
                                if ($picture!=''){
                                    echo ('src="media/profilepics/'.$picture .'"');
                                }
                                else if ($genere !== "femmina"){
                                    echo 'src="media/avatar-male.jpg"';
                                }
                                else{
                                    echo 'src="media/avatar-female.jpg"';
                                }
                            ?>/>
                            <span class="font-weight-bold mt-2"><b><?php echo $_SESSION["username"] ?></b></span>
                            <span style="font-weight: 300px"><?php echo $_SESSION["email"] ?></span>
                            <span> </span>
                        </div>
                     </div>
                <div class="col-md-5 border-right">
                    <div class="px-3 py-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right"><b>Informazioni Profilo</b></h4>    
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
                                                <b>Facolt??</b><br>';
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
                                    <button id="editbutton" class="btn btn-primary profile-button" type="button" onclick="editProfile(<?php echo $usernameStringed ?>)">Modifica Profilo</button>
                                </div>
                            </div>
                    </div>
                </div>
            
            </div>
        </div>
    </main >

    <!-- Funzione JS che osserva se il parametro GET mode ?? uguale a edit o a create-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let user=<?php echo(json_encode($usernameStringed)); ?>;
            
            if (findGetParameter("mode")=="edit" || findGetParameter("mode")=="new"){
                editProfile(user);
            }
        }, false);
    </script>


    <?php
        
        include_once("../usualelements/footer.php");
    ?>
