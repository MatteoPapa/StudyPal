
function validaForm(){
    if (document.signupForm.pass.value!=document.signupForm.re_pass.value){
        alert("Le password non corrispondono");
        return false;
    }
    return true;
}