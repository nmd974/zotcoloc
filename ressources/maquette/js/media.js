$(document).ready(function(){
    if(window.innerWidth <= 414){
        $('#input-group').removeClass('input-group');
        
    } else {
        $('#input-group').addClass('input-group'); 
    }
});