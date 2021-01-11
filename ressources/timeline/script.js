$(document).ready(() =>{
    let taille = $('.line_time').css('width');
    taille = Math.round(parseInt(taille)) / 4;
    $('.btn').on('click', () => {
        let width_actuelle = $('.line_time_progress').css('width');
        width_actuelle = parseInt(width_actuelle) + taille;
        if(parseInt(width_actuelle) + 3 <= taille * 4){
            $('.line_time_progress').css('width', width_actuelle + 'px');
        }
    })
})