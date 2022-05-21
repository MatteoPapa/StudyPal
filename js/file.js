//SHOWING HEADER BACKGROUND WHEN SCROLLING DOWN

window.addEventListener("scroll", (event) => {
    let scroll = this.scrollY;
    if (scroll>2){
        $('.headerbackground').addClass("headvisible");
    }
    else{
        $('.headerbackground').removeClass("headvisible");
    }
});

//SIDEBAR



function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    $('body').addClass('stop-scrolling');
    $('body').bind('touchmove', function(e){e.preventDefault()});
    document.getElementById('#main').addEventListener('click', closeNav);
  }

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    $('body').removeClass('stop-scrolling');
    $('body').unbind('touchmove');
}

//PROFILE CHECKBOX LICEALE-UNIVERSITARIO

function licealeUniversitario(){
    if(document.getElementById('liceale').checked) {
        document.getElementById("facoltadiv").style.display="none";
        document.getElementById("facoltas").required=false;
        document.getElementById("indirizzodiv").style.display="block";
        document.getElementById("indirizzos").required=true;

    }else if(document.getElementById('universitario').checked) {
        document.getElementById("facoltadiv").style.display="block";
        document.getElementById("facoltas").required=true;
        document.getElementById("indirizzodiv").style.display="none";
        document.getElementById("indirizzos").required=false;
    }
    else{
        document.getElementById("facoltadiv").style.display="none";
        document.getElementById("facoltas").required=false;
        document.getElementById("indirizzodiv").style.display="none";
        document.getElementById("indirizzos").required=false;
    }
}

var ex=document.getElementById('exampleFormControlSelect1');
if (ex!=null) ex.addEventListener('input', function (event) {

    if (event.target.value=="Liceale"){
        document.getElementById("facoltadiv2").style.display="none";
        document.getElementById("indirizzodiv2").style.display="block";
        document.getElementById("emptydiv").style.display="none";


        $('.universitariofilter').addClass("disappear");
        $('.licealefilter').removeClass("disappear");

        updateLiceo();
    }
    else if (event.target.value=="Universitario"){
        document.getElementById("facoltadiv2").style.display="block";
        document.getElementById("indirizzodiv2").style.display="none";
        document.getElementById("emptydiv").style.display="none";

        $('.universitariofilter').removeClass("disappear");
        $('.licealefilter').addClass("disappear");

        updateUni();
    }
    else{
        document.getElementById("facoltadiv2").style.display="none";
        document.getElementById("indirizzodiv2").style.display="none";
        document.getElementById("emptydiv").style.display="block";

        $('.universitariofilter').removeClass("disappear");
        $('.licealefilter').removeClass("disappear");
    }
}, false);

//LICEO SELECTOR JAVASCRIPT

var ex=document.getElementById('exampleFormControlSelect1');
if (ex!=null) document.getElementById('exampleFormControlSelectLiceo').addEventListener('input', function (event) {
    let filter=event.target.value;
    filter = filter.replace(/\s+/g, '');

    var theArray = document.getElementsByClassName('licealefilter');
    if (filter!=""){
        for (i = 0; i < theArray.length; i++) {
            if (theArray[i].id==filter){
                theArray[i].classList.remove("disappear");
            }    
            else{
                theArray[i].classList.add("disappear");
            }    
        } 
    }
    else{
        for (i = 0; i < theArray.length; i++) {
                theArray[i].classList.remove("disappear");
        } 
    }

}, false);

function updateLiceo(){
    let filter=document.getElementById('exampleFormControlSelectLiceo').value;
    filter = filter.replace(/\s+/g, '');

    var theArray = document.getElementsByClassName('licealefilter');
    if (filter!=""){
        for (i = 0; i < theArray.length; i++) {
            if (theArray[i].id==filter){
                theArray[i].classList.remove("disappear");
            }    
            else{
                theArray[i].classList.add("disappear");
            }    
        } 
    }
    else{
        for (i = 0; i < theArray.length; i++) {
                theArray[i].classList.remove("disappear");
        } 
    }
}

//UNIVERSITA'

var ex=document.getElementById('exampleFormControlSelect1');
if (ex!=null) document.getElementById('exampleFormControlSelectUni').addEventListener('input', function (event) {

    let filter=event.target.value;
    filter = filter.replace(/\s+/g, '');

    var theArray = document.getElementsByClassName('universitariofilter');
    if (filter!=""){
        for (i = 0; i < theArray.length; i++) {
            if (theArray[i].id==filter){
                theArray[i].classList.remove("disappear");
            }    
            else{
                theArray[i].classList.add("disappear");
            }    
        } 
    }
    else{
        for (i = 0; i < theArray.length; i++) {
                theArray[i].classList.remove("disappear");
        } 
    }

}, false);

function updateUni(){
    let filter=document.getElementById('exampleFormControlSelectUni').value;
    filter = filter.replace(/\s+/g, '');

    var theArray = document.getElementsByClassName('universitariofilter');
    if (filter!=""){
        for (i = 0; i < theArray.length; i++) {
            if (theArray[i].id==filter){
                theArray[i].classList.remove("disappear");
            }    
            else{
                theArray[i].classList.add("disappear");
            }    
        } 
    }
    else{
        for (i = 0; i < theArray.length; i++) {
                theArray[i].classList.remove("disappear");
        } 
    }
}

//PROFILE CHECKBOX MASCHIO-FEMMINA

function maschioFemmina(){
    if(document.getElementById('maschio').checked) {
        document.getElementById('avatarimage').src="media/avatar-male.jpg";
    }else if(document.getElementById('femmina').checked) {
        document.getElementById('avatarimage').src="media/avatar-female.jpg";
    }
    else{
        document.getElementById('avatarimage').src="media/avatar-male.jpg";
    }
}

//BIO APPEARS
function biografiaAppears(biografia){
    console.log(biografia);
    document.getElementById("biografiainpopup").innerHTML = biografia;
    $('.popupbio-container').css('display','flex');
    $('.popupbio-container').css('opacity','1');
    $('body').addClass('stop-scrolling');
    $('body').bind('touchmove', function(e){e.preventDefault()});

}

function biografiaDisappears(){
    $('.popupbio-container').css('display','none');
    $('.popupbio-container').css('opacity','0');
    $('body').removeClass('stop-scrolling');
    $('body').unbind('touchmove');
}




//PROFILE AJAX (&JQuery)

function editProfile(username){
        $("#profilecontainer").load("profileutility/load-profile.php",{
            profileUsername: username
        });
        
}

function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
          tmp = item.split("=");
          if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

function compilaMessage(){
    if (findGetParameter("mode")=="edit"){
        document.getElementById('compilaPrima').style.display="block";
    }
}