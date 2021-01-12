$(document).ready(function(){
    if(window.innerWidth <= 426){
        $('#input-group').removeClass('input-group');
        // $('#footer-center').removeClass('justify-content-between');
        // $('#footer-center').addClass('justify-content-center');
   
    } else {
        $('#input-group').addClass('input-group'); 
        // $('#footer-center').removeClass('justify-content-center');
        // $('#footer-center').addClass('justify-content-between');
    }
});

// $(document).ready(function(){
//     if(window.innerWidth <= 426){
//        $("#input-group").toggleClass("input-group"); 
        
//     }
// });

// $(document).ready(function(){
// alert(window.innerWidth);
// });
//le message apparait bien