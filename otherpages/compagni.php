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
 
     $buffer=str_replace("%TITLE%","StudyPal - Compagni",$buffer);
     echo $buffer;

    include_once("../profileutility/profile-data.php");
?>
    

<main>
    <div class="jumbotron">
    
      <div class="blur">

          <div class="spacer"></div>

          <section class="py-1 text-center container">
              <div class="row py-lg-5 pt-5">
                  <div class="col-lg-6 col-md-8 mx-auto">
                      <div class="whiteback px-lg-7">
                          <div class="jumbotext my-3">
                              <h1 class="fw-light"><b>Compagni</b></h1>
                              
                          </div>
                      </div>
                  </div>
              </div>
          </section>

      </div>
    </div>
    <div class="searchbody">
        <div class="container">
            <!--SEARCH BAR-->
            <div class="row">
                <div class="col-lg-12 card-margin">
                    <div class="card search-form">
                        <div class="card-body p-0">
                            <form id="search-form">
                                <div class="row">
                                    <div class="row col-12">
                                            <div class="col-lg-3 indirizzofacoltasearch">
                                                <select class="indfacselect form-control" id="exampleFormControlSelect1">
                                                    <option>Tutti</option>
                                                    <option value="Liceale">Liceale</option>
                                                    <option value="Universitario">Universitario</option>
                                                    
                                                </select>
                                            </div>
                                            <div id="indirizzodiv2" class="col-lg-6 indirizzofacoltasearch">
                                                <select class="indfacselect form-control" id="exampleFormControlSelectLiceo">
                                                    <option value="">Tutti gli indirizzi</option>
                                                    <option value="Liceo Artistico" <?php if ($facolta=="Liceo Artistico") echo "selected"?>>Liceo Artistico</option>
                                                    <option value="Liceo Classico" <?php if ($facolta=="Liceo Classico") echo "selected"?>>Liceo Classico</option>
                                                    <option value="Liceo Linguistico" <?php if ($facolta=="Liceo Linguistico") echo "selected"?>>Liceo Linguistico</option>
                                                    <option value="Licei musicali e coreutici" <?php if ($facolta=="Licei musicali e coreutici") echo "selected"?>>Licei musicali e coreutici</option>
                                                    <option value="Liceo Scientifico" <?php if ($facolta=="Liceo Scientifico") echo "selected"?>>Liceo Scientifico</option>
                                                    <option value="Liceo Scientifico - opzione Scienze applicate" <?php if ($facolta=="Liceo Scientifico - opzione Scienze applicate") echo "selected"?>>Liceo Scientifico - opzione Scienze applicate</option>
                                                    <option value="Liceo Scientifico - sezione a indirizzo sportivo" <?php if ($facolta=="Liceo Scientifico - sezione a indirizzo sportivo") echo "selected"?>>Liceo Scientifico - sezione a indirizzo sportivo</option>
                                                    <option value="Liceo Scienze umane" <?php if ($facolta=="Liceo Scienze umane") echo "selected"?>>Liceo Scienze umane</option>
                                                    <option value="Liceo Scienze umane - opzione economico sociale" <?php if ($facolta=="Liceo Scienze umane - opzione economico sociale") echo "selected"?>>Liceo Scienze umane - opzione economico sociale</option>
                                                    <option value="Istituto Tecnico" <?php if ($facolta=="Istituto Tecnico") echo "selected"?>>Istituto Tecnico</option>
                                                    <option value="Istituto Professionale" <?php if ($facolta=="Istituto Professionale") echo "selected"?>>Istituto Professionale</option>
                                                </select>
                                            </div>
                                            <div id="facoltadiv2" class="col-lg-6 indirizzofacoltasearch">
                                                <select class="indfacselect form-control" id="exampleFormControlSelectUni">
                                                    <option value="">Tutte le facoltà</option>    
                                                    <option value="Altro" <?php if ($facolta=="Altro") echo "selected"?>>Altro</option>
                                                    <option value="Agraria" <?php if ($facolta=="Agraria") echo "selected"?>>Agraria</option>
                                                    <option value="Architettura" <?php if ($facolta=="Architettura") echo "selected"?>>Architettura</option>
                                                    <option value="Architettura Urbanistica e Ingegneria delle costruzioni" <?php if ($facolta=="Architettura Urbanistica e Ingegneria delle costruzioni") echo "selected"?>>Architettura Urbanistica e Ingegneria delle costruzioni</option>
                                                    <option value="Beni Culturali o Conservazione di Beni Culturali" <?php if ($facolta=="Beni Culturali o Conservazione di Beni Culturali") echo "selected"?>>Beni Culturali o Conservazione di Beni Culturali</option>
                                                    <option value="Biotecnologie o Scienze Biotecnologiche" <?php if ($facolta=="Biotecnologie o Scienze Biotecnologiche") echo "selected"?>>Biotecnologie o Scienze Biotecnologiche</option>
                                                    <option value="Chimica" <?php if ($facolta=="Chimica") echo "selected"?>>Chimica</option>
                                                    <option value="Design o Design e Arti" <?php if ($facolta=="Design o Design e Arti") echo "selected"?>>Design o Design e Arti</option>
                                                    <option value="Economia" <?php if ($facolta=="Economia") echo "selected"?>>Economia</option>
                                                    <option value="Farmacia" <?php if ($facolta=="Farmacia") echo "selected"?>>Farmacia</option>
                                                    <option value="Giurisprudenza" <?php if ($facolta=="Giurisprudenza") echo "selected"?>>Giurisprudenza</option>
                                                    <option value="Informatica" <?php if ($facolta=="Informatica") echo "selected"?>>Informatica</option>
                                                    <option value="Ingegneria" <?php if ($facolta=="Ingegneria") echo "selected"?>>Ingegneria</option>
                                                    <option value="Ingegneria Industriale o dei Processi Industriali" <?php if ($facolta=="Ingegneria Industriale o dei Processi Industriali") echo "selected"?>>Ingegneria Industriale o dei Processi Industriali</option>
                                                    <option value="Ingegneria Informatica" <?php if ($facolta=="Ingegneria Informatica") echo "selected"?>>Ingegneria Informatica</option>
                                                    <option value="Ingegneria dell’Informazione" <?php if ($facolta=="Ingegneria dell’Informazione") echo "selected"?>>Ingegneria dell’Informazione</option>
                                                    <option value="Ingegneria Edile" <?php if ($facolta=="Ingegneria Edile") echo "selected"?>>Ingegneria Edile</option>
                                                    <option value="Interpretariato e Traduzione" <?php if ($facolta=="Interpretariato e Traduzione") echo "selected"?>>Interpretariato e Traduzione</option>
                                                    <option value="Lettere e Filosofia" <?php if ($facolta=="Lettere e Filosofia") echo "selected"?>>Lettere e Filosofia</option>
                                                    <option value="Lingue e Letterature Straniere" <?php if ($facolta=="Lingue e Letterature Straniere") echo "selected"?>>Lingue e Letterature Straniere</option>
                                                    <option value="Mediazione Linguistica e Culturale" <?php if ($facolta=="Mediazione Linguistica e Culturale") echo "selected"?>>Mediazione Linguistica e Culturale</option>
                                                    <option value="Medicina e Chirurgia" <?php if ($facolta=="Medicina e Chirurgia") echo "selected"?>>Medicina e Chirurgia</option>
                                                    <option value="Medicina Veterinaria" <?php if ($facolta=="Medicina Veterinaria") echo "selected"?>>Medicina Veterinaria</option>
                                                    <option value="Musicologia" <?php if ($facolta=="Musicologia") echo "selected"?>>Musicologia</option>
                                                    <option value="Odontoiatria" <?php if ($facolta=="Odontoiatria") echo "selected"?>>Odontoiatria e protesi Dentaria</option>
                                                    <option value="Professioni Sanitarie" <?php if ($facolta=="Professioni Sanitarie") echo "selected"?>>Professioni Sanitarie</option>
                                                    <option value="Psicologia" <?php if ($facolta=="Psicologia") echo "selected"?>>Psicologia</option>
                                                    <option value="Scienze del Farmaco" <?php if ($facolta=="Scienze del Farmaco") echo "selected"?>>Scienze del Farmaco</option>
                                                    <option value="ScienzedelBen" <?php if ($facolta=="ScienzedelBen") echo "selected"?>>Scienze del Benessere o Scienze Motorie
                                                    <option value="Scienze Motorie" <?php if ($facolta=="Scienze Motorie") echo "selected"?>>Scienze Motorie</option>
                                                    <option value="Scienze della Comunicazione" <?php if ($facolta=="Scienze della Comunicazione") echo "selected"?>>Scienze della Comunicazione</option>
                                                    <option value="Scienze della Formazione" <?php if ($facolta=="Scienze della Formazione") echo "selected"?>>Scienze della Formazione</option>
                                                    <option value="Scienze e Tecnologie" <?php if ($facolta=="Scienze e Tecnologie") echo "selected"?>>Scienze e Tecnologie</option>
                                                    <option value="Scienze Matematiche, Fisiche e Naturali" <?php if ($facolta=="Scienze Matematiche, Fisiche e Naturali") echo "selected"?>>Scienze Matematiche, Fisiche e Naturali</option>
                                                    <option value="Scienze Politiche" <?php if ($facolta=="Scienze Politiche") echo "selected"?>>Scienze Politiche</option>
                                                    <option value="Scienze Sociali" <?php if ($facolta=="Scienze Sociali") echo "selected"?>>Scienze Sociali</option>
                                                    <option value="Scienze Statistiche" <?php if ($facolta=="Scienze Statistiche") echo "selected"?>>Scienze Statistiche</option>
                                                    <option value="Sociologia" <?php if ($facolta=="Sociologia") echo "selected"?>>Sociologia</option>
                                                    <option value="Studi Orientali" <?php if ($facolta=="Studi Orientali") echo "selected"?>>Studi Orientali</option>
                                                </select>
                                            </div>
                                            <div id="emptydiv" class="col-lg-6 ">
                                            </div>
                                    </div>
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
            
            <!--SEARCH BODY-->
            <div class="row">
                <div class="col-12">
                    <div class="mainbody card card-margin py-4 px-2">
                        <div class="card-body2">
                            <div class="row search-body">
                                <div class="col-lg-12">
                                    <div class="search-result">

                                        <!--RESULT HEADER-->
                                        <div class="result-header">
                                            <div class="row">
                                                <div class="col-lg-12 text-center">
                                                    <div class="records" style="text-decoration:underline"><b>Risultati:</b></div>
                                                    <p class="mt-1">Seleziona un utente per vedere il suo profilo</p>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <!--RESULT BODY-->
                                        <div class="result-body">
                                            <div class="table-responsive">
                                                <?php
                                                    $sql="SELECT * FROM profile order by username;";
                                                    $result=mysqli_query($conn,$sql);

                                                    while($row2=mysqli_fetch_assoc($result)){
                                                        
                                                            $searchUsername=$row2["username"];
                                                            $searchGenere= $row2["genere"];
                                                            $searchStudente= $row2["studente"];
                                                            $searchFacolta= $row2["facolta"];
                                                            $searchBiografia=$row2["biografia"];
                                                            $searchNome=$row2["nome"];
                                                            $searchCognome=$row2["cognome"];
                                                        if ($searchGenere!="" && $_SESSION["username"]!=$searchUsername){
                                                            include("../compagniutility/accountline.php");
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                        

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="popupbio-container">
        <div class="popupbio">
            <div class="border bordertop">
                <b>Biografia</b>
                <div class="popup-closer" onclick="biografiaDisappears()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                    </svg>
                </div>
            </div>
                
            <div class="main">
                <p id="biografiainpopup">Nessuna biografia</p>
            </div>
            
        </div>
    </div>
</main>

    <?php
        include_once("../usualelements/footer.php");
    ?>
