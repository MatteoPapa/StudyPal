<!-- PHP PER TABELLA COMPAGNI-->

<!--DIAMO DELLE CLASSI ALLA TABLE DIVERSE A SECONDA DEI DATI DELL'UTENTE, PER POI UTILIZZARLE IN JS-->

<a class="profilerow" href="compagniutility/compagni.user.php?user=<?=$searchUsername?>">
    <table style="font-size:large" class="tablerowhover widget-26 <?php
            if ($searchStudente=="liceale"){
                echo "licealefilter";
            }
            else if ($searchStudente=="universitario"){
                echo "universitariofilter";
            }
        ?>" id="<?php
            $newStr=str_replace(' ','',$searchFacolta);
            echo $newStr;
        ?>">
        <tbody>

            <tr class="tablerow">
                    <td class="tableavatar px-2 my-2" style="width:35px;">
                        <div class="widget-26-job-emp-img">
                            <img class="avatarsearch" src="<?php
                                if ($searchGenere=="femmina"){
                                    echo "media/avatar-female.jpg";
                                }
                                else{
                                    echo "media/avatar-male.jpg";
                                }
                            
                            ?>" alt="Avatar" />
                        </div>
                    </td>
                    <td class="tableinfos my-2">
                        <div class="widget-26-job-title">
                            
                            <?php echo $searchNome . " " . $searchCognome?><br>
                            <span style="font-size:small"><?php echo "  " . $searchFacolta?></span>
                            <p class="m-0">
                                <a href="../compagniutility/compagni.user.php?user=<?=$searchUsername?>" class="employer-name">
                                    <b><?php echo $searchUsername?><br></b>
                                </a>
                            </p>
                            
                        </div>
                    </td>

                    <td class="tablebio my-2">
                        <div class="biocontainer">
                            <p class="type m-0"><?php echo $searchBiografia?></p>
                        </div>
                    </td>
                    
                        <td class="tablebioicon">
                            <div id="chaticon" class="px-2">
                                <a href="javascript:void(0);" onclick='biografiaAppears(<?php echo json_encode($searchBiografia)?>)'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chat-quote" viewBox="0 0 16 16">
                                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                                    <path d="M7.066 6.76A1.665 1.665 0 0 0 4 7.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 0 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 7.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 0 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z"/>
                                </svg></a>
                            </div>
                        </td> 
                    
            </tr>
            
        </tbody>
    </table>
</a>