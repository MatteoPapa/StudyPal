<?php
    //CONTROLLA SE UNA PERSONA E' LOGGATA
    session_start();
    if (!isset($_SESSION["username"])){
        header("location: ../login-signup/login.php");
        exit();
    }

    //CONTROLLA SE IL PROFILO DI UNA PERSONA LOGGATA E' CONFIGURATO
    if (isset($_SESSION["username"])){
        include_once("../profileutility/profile-data.php");
            if ($genere==""){
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
 
     $buffer=str_replace("%TITLE%","StudyPal - Annunci",$buffer);
     echo $buffer;

    include_once("../profileutility/profile-data.php");
?>
    

<main>
    <div class="jumbotron">
    
        <div class="blur">

          <div class="spacer"></div>

          <section class="py-1 text-center container">
              <div class="row py-lg-3 pt-3">
                  <div class="col-lg-6 col-md-8 mx-auto">
                      <div class="whiteback px-lg-7">
                          <div class="jumbotext my-3">
                              <h1 class="fw-light"><b>Annunci</b></h1>
                              
                          </div>
                      </div>
                  </div>
              </div>
          </section>
    
        </div>
    </div>

    <div class="container rounded bg-white mt-0 mb-5 py-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 border-right">
                <div class="p-3 py-0">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right"><b>Scrivi Annuncio</b></h4>
                    </div>

                    
                    <!--INIZIO FORM EDIT-->

                    <form action="annunciutility/publish.inc.php" name="publishForm" method="POST" id="publishForm">

                        

                        <div class="row mt-1">
                            
                            <div class="col-md-12 py-2"><b>Luogo</b><br>
                                <div class="py-2">
                                    <input type="text" class="form-control" name="luogo" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-12 py-2"><b>Data</b><br>
                                <div class="py-2">
                                    <input type="date" class="form-control" name="data" required>
                                </div>
                            </div>

                            <div class="col-md-12 py-2">
                                <b>Descrizione</b><br>
                                <textarea class="bioedit form-control" name="descrizione" rows="3" cols="60" form="publishForm" required></textarea>
                            </div>
                        </div>
                        <div class="d-flex column justify-content-start">
                            <div class="mt-3 text-center px-2">
                                <button class="btn btn-primary profile-button" name="submitbutton" type="submit">Pubblica</button>
                            </div>

                            <div class="mt-3 text-center px-2">
                                <button class="btn btn-danger profile-button" type="button" onclick="location.href ='otherpages/annunci.php'">Annulla</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        
        </div>
    </div>

    <?php
        include_once("../usualelements/footer.php");
    ?>
