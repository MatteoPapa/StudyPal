<?php

    //PER EDITARE IL PROFILO

    session_start();    
    $username=$_POST["profileUsername"];
    $email=$_SESSION["email"];

    require_once("../profileutility/profile-data.php");
?>

    <div class="container rounded bg-white mt-1 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-2 mb-2" id="avatarimage" width="150px" height="150px"/>
                    <span class="font-weight-bold"><b><?php echo $username?></b></span>
                    <span style="font-weight: 300px"><?php echo $email?></span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right"><b>Informazioni Profilo</b></h4>
                    </div>

                    <div id="compilaPrima" style="display:none">
                        <h6 style="color:red">*E' necessario compilare le seguenti informazioni prima di poter usare StudyPal</h6>
                    </div>
                    <!--INIZIO FORM EDIT-->

                    <form action="profileutility/edit-profile.inc.php" name="editForm" method="POST" id="edit-form">

                        <div class="row">
                            <div class="col-md-12 py-2"><b>Genere</b><br>
                                <div class="py-2">
                                    <input  type="radio" name="genere" id="maschio" value="maschio" <?php if ($genere=="maschio") echo "checked"?>
                                    
                                    onchange="maschioFemmina()" required>
                                    <label class="labels px-1" for="">Maschio</label>

                                    <input type="radio" name="genere" id="femmina" value="femmina" <?php if ($genere=="femmina") echo "checked"?>
                                    onchange="maschioFemmina()">
                                    <label class="labels px-1" for="">Femmina</label>

                                    
                                </div>
                            </div>
                            <div class="col-md-6 py-2"><b>Nome</b><input type="text" class="form-control my-2" name="nome" placeholder="Nome" value="<?php echo $nome?>" required></div>
                            <div class="col-md-6 py-2"><b>Cognome</b><input type="text" class="form-control my-2" name="cognome" placeholder="Cognome" value="<?php echo $cognome?>" required></div>
                        </div>

                        <div class="row mt-1">
                            
                            <div class="col-md-12 py-2"><b>Studente</b><br>
                                <div class="py-2">
                                    <input  type="radio" name="studente" id="liceale" value="liceale" <?php if ($studente=="liceale") echo "checked"?>
                                    onchange="licealeUniversitario()" required>
                                    <label class="labels px-1" for="">Liceale</label>

                                    <input type="radio" name="studente" id="universitario" value="universitario" <?php if ($studente=="universitario") echo "checked"?>
                                    onchange="licealeUniversitario()">
                                    <label class="labels px-1" for="">Universitario</label>
                                </div>
                            </div>

                            <div class="col-md-12 py-2">
                                <div id="indirizzodiv">
                                    <b>Indirizzo</b><br>
                                    <select class="form-select" style="width:60%" name="indirizzo" id="indirizzos" placeholder="seleziona" form="edit-form">
                                        <option selected="selected" disabled="disabled" value="">Seleziona</option>  
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
                                <div id="facoltadiv">
                                    <b>Facoltà</b><br>
                                    <select class="form-control select2 select2-hidden-accessible" style="width:60%" name="facolta" id="facoltas" placeholder="seleziona" form="edit-form">
                                        <option selected="selected" disabled="disabled" value="">Seleziona</option>    
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
                            </div>
                            <div class="col-md-12 py-2">
                                <b>Biografia</b><br>
                                <textarea class="bioedit form-control" name="biografia" rows="3" cols="60" form="edit-form"><?php echo $biografia?></textarea>
                            </div>
                        </div>
                        <div class="d-flex column justify-content-start">
                            <div class="mt-3 text-center px-2">
                                <button class="btn btn-primary profile-button" name="submitbutton" type="submit">Salva Profilo</button>
                            </div>

                            <div class="mt-3 text-center px-2">
                                <button class="btn btn-danger profile-button" type="button" onclick="location.href ='otherpages/profile.php'">Annulla</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        
        </div>
    </div>

    <script>
            licealeUniversitario();
            maschioFemmina();
            compilaMessage();
    </script>
