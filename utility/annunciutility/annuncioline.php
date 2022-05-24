<?php 
    //GOOD FORMAT FOR DATE
    $currentYear=date('Y');
    $searchData=str_replace($currentYear . '-','',$searchData);
    $searchData=str_replace('-','/',$searchData);
    $mese=substr($searchData,0,2);
    $giorno=substr($searchData,3,5);
    $searchData= $giorno . "/" . $mese;

    //GOOD FORMAT FOR TIME
    $searchTime=substr($searchTime,0,-3);

    //IS IT LIKED FROM YOU ?
    $sql= "SELECT * FROM likes WHERE (liker='$username' and idannuncio='$searchId')";
    $isitliked=mysqli_query($conn,$sql);
    $liked=mysqli_fetch_assoc($isitliked);

    //HOW MANY LIKES
    $sql= "SELECT * FROM likes WHERE idannuncio='$searchId'";
    $query=mysqli_query($conn,$sql);
    $likecount=mysqli_num_rows($query);
?>
<li>
    <!-- begin timeline-time -->
    <div class="timeline-time">
        <span class="date"><?=$searchTime?></span>
       
        <span class="time"><?=$searchData?></span>
    </div>
    <!-- end timeline-time -->
    <!-- begin timeline-icon -->
    <div class="timeline-icon">
        <a>&nbsp;</a>
    </div>
    <!-- end timeline-icon -->
    <!-- begin timeline-body -->
    <div class="timeline-body">
        <div class="timeline-header">
            <div class="userimage"><img class="imageannunci" src="<?php
            if ($searchPicture!=""){
                echo ("media/profilepics/".$searchPicture);
            }
            else if ($searchGenere=="maschio"){
                echo "media/avatar-male.jpg";
            }
            else{
                echo "media/avatar-female.jpg";
            }
            ?>" alt=""></div>
            
            <a class="userfromannunci" href="utility/compagniutility/compagni.user.php?user=<?php echo $searchUsername?>">
            <span class="username"><?php echo $searchUsername?></span></a> 
            
            <?php
                if ($searchUsername==$_SESSION["username"]){
                    echo '<label id="deletelabel" class="mx-5 annunciodeleter" onclick="deleteAnnuncio('. $searchId.')">

                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            <span id="deletetext" style="color:red">Elimina questo annuncio</span>

                            </label>';
                }
            ?>
            
        </div>
        <div class="timeline-content">
            <b >
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            <span style="text-decoration:underline;font-size:1.3em"><?php echo $searchLuogo?></span></b>
            <p class="my-1" style="font-size:1.3em">
            <?php echo $searchDescrizione?>
            </p>
        </div>
        <div class="timeline-likes">
            <div class="stats">
                <span class="fa-stack fa-fw stats-icon">
                <i class="fa fa-circle fa-stack-2x text-danger"></i>
                <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                </span>
                <span class="fa-stack fa-fw stats-icon">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                </span>

                

                <svg id="balloonlike" xmlns="http://www.w3.org/2000/svg" style="display:<?php if ($searchUsername==$_SESSION["username"]) echo "none"?>"width="20" height="20" fill="<?php
                if ($liked){
                    echo 'blue';
                }
                else{
                    echo 'currentColor';
                }
                ?>" class="bi bi-balloon" viewBox="0 0 16 16" onclick='ballonlike(<?php echo json_encode($searchId)?>,<?php echo json_encode($username)?>)'>
                    <path fill-rule="evenodd" d="M8 9.984C10.403 9.506 12 7.48 12 5a4 4 0 0 0-8 0c0 2.48 1.597 4.506 4 4.984ZM13 5c0 2.837-1.789 5.227-4.52 5.901l.244.487a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.244-.487C4.789 10.227 3 7.837 3 5a5 5 0 0 1 10 0Zm-6.938-.495a2.003 2.003 0 0 1 1.443-1.443C7.773 2.994 8 2.776 8 2.5c0-.276-.226-.504-.498-.459a3.003 3.003 0 0 0-2.46 2.461c-.046.272.182.498.458.498s.494-.227.562-.495Z"/>
                </svg>
                <span class="stats-total"><?php
                    if ($liked){
                        echo 'Tu ';
                        if ($likecount-1==0){
                            echo 'ci sarai';
                        }
                        else if($likecount-1==1){
                            echo "e un'altra persona ci sarete";
                        }
                        else{
                            echo 'e altre ' . $likecount-1 .' persone ci sarete';
                        }
                    }
                    else{
                        if ($likecount==1){
                            echo "Una persona ci sarà";
                        }
                        if ($likecount>1){
                            echo $likecount . " persone ci saranno";
                        }
                    }
                    
                ?>
                </span>
            </div>
        </div>
    </div>
    <!-- end timeline-body -->
</li>