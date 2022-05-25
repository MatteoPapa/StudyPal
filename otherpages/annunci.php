<?php
    //CONTROLLA SE UNA PERSONA E' LOGGATA
    session_start();
    if (!isset($_SESSION["username"])){
        header("location: ../login-signup/login.php");
        exit();
    }

    //CONTROLLA SE IL PROFILO DI UNA PERSONA LOGGATA E' CONFIGURATO
    if (isset($_SESSION["username"])){
        include_once("../utility/profileutility/profile-data.php");
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

    include_once("../utility/profileutility/profile-data.php");
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="content" class="content content-full-width">
                    <div class="searchbar d-flex justify-content-center align-items-center py-4 col-12">
                        
                            <!--<div class="searchform">
                                <form action="index.php" style="width:100%" class="d-flex col-12">
                                    <label>
                                        <input style="display:none" type="submit"/>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                    </label>
                                    <input type="text" class="form-control annuncisearch" placeholder="Cerca..." style="border:0;">
                                </form>
                            </div>-->
                        
                        <button class="btn btn-success writeannuncio">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                            <a href="utility/annunciutility/write.php"><span class="mx-1" style="color:white">Scrivi un annuncio</span></a>
                        </button>
                    </div>
                    <!-- begin profile-content -->
                    <div class="profile-content">
                    <!-- begin tab-content -->
                    <div class="tab-content p-0">
                        <!-- begin #profile-post tab -->
                        <div class="tab-pane fade active show" id="profile-post">
                            <!-- begin timeline -->
                            <ul class="timeline">

                                
                            <?php
                                $sql="SELECT * FROM annunci order by data";
                                $result=mysqli_query($conn,$sql);
                                
                                while($row2=mysqli_fetch_assoc($result)){

                                        
                                        $searchUsername=$row2["username"];
                                        
                                        $searchGenere= $row2["genere"];
                                        $searchLuogo= $row2["luogo"];
                                        $searchDescrizione= $row2["descrizione"];
                                        $searchId=$row2["id"];
                                        $searchData=$row2["data"];
                                        $searchTime=$row2["orario"];
                                        $currentDate=date('Y-m-d');
                                        
                                        $sql2="SELECT * FROM profile where username='$searchUsername'";
                                        $result2=mysqli_query($conn,$sql2);
                                        $row3=mysqli_fetch_assoc($result2);
                                        $searchPicture=$row3["picture"];
                                        
                                        if ($searchData<$currentDate){
                                            echo "";
                                            continue;
                                        }
                                        
                                        if ($searchLuogo!=""){
                                            include("../utility/annunciutility/annuncioline.php");
                                        }
                                }
                            ?>
            
                            </ul>
                            <!-- end timeline -->
                        </div>
                        <!-- end #profile-post tab -->
                    </div>
                    <!-- end tab-content -->
                    </div>
                    <!-- end profile-content -->
                </div>
            </div>
        </div>
    </div>
    <?php
        include_once("../usualelements/footer.php");
    ?>
