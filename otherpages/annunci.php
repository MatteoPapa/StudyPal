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
        include_once("../usualelements/header.php");
    ?>
    
<main>
  <div class="jumbotron">
    
      <div class="blur">

          <div class="spacer"></div>

          <section class="py-1 text-center container">
              <div class="row py-lg-5 pt-5">
                  <div class="col-lg-6 col-md-8 mx-auto">
                      <div class="whiteback px-lg-7">
                          <div class="jumbotext">
                              <h1 class="fw-light"><b>Annunci</b></h1>
                              <p class="lead">Grazie a questo sito web potrai trovare il compagno di studi che fa per te</p>
                              <p>
                                  <a href="otherpages/compagni.php" class="btn btn-primary my-2">Inizia adesso!</a>
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

      </div>
  </div>

</main>

<?php
    include_once("../usualelements/footer.php");
?>
