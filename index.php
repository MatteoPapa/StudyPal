<?php
    session_start();
    include_once("usualelements/header.php");
    
?>

  <main id="#main">
    <div class="jumbotron">
      
        <div class="blur">

            <div class="spacer"></div>

            <section class="py-1 text-center container">
                <div class="row py-lg-5 pt-5">
                    <div class="col-lg-6 col-md-8 mx-auto py-2">
                        <div class="whiteback px-lg-7">
                            <div class="jumbotext">
                              <img id="logo" src="media/StudyPalLogo.png" alt="StudyPalLogo">
                              <h1 class="fw-light"><b>Smetti di studiare da solo!</b></h1>
                              <p class="lead">Grazie a questo sito web potrai trovare il compagno di studi che fa per te</p>
                              <p>
                                  <a href="otherpages/compagni.php" class="btn btn-danger my-2">Inizia adesso!</a>
                              </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <div class="album py-5">
      <div class="d-flex justify-content-center px-5">

        <div class="row rowalbum row-cols-1 row-cols-sm-2 py-3">
          <div class="blockimg col py-3">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <image class="templateimg" xlink:href="media/peoplestudying.jpg" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMinYMin slice"/>
              </svg>

              <div class="card-body">
                <h4><b>Compagni</b></h4>
                <p class="card-text">Cerca il tuo compagno di studi fra gli studenti iscritti al nostro sito web, selezionando la materia che desideri.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="otherpages/compagni.php">
                      <button type="button" id="logbut" class="btn logbutton btn-danger me-1 ">Vedi</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="blockimg col py-3">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <image class="templateimg" xlink:href="media/boredgirl.jpg" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMinYMin slice"/>
              </svg>

              <div class="card-body">
                <h4><b>Annunci</b></h4>
                <p class="card-text">Controlla la sezione degli annunci, scoprendo se puoi raggiungere qualcuno per studiare insieme.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="otherpages/annunci.php">
                      <button type="button" id="logbut" class="btn logbutton btn-danger me-1 ">Vedi</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php
      include_once("usualelements/footer.php");
  ?>
