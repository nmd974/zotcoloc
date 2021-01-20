let titre_logement = document.getElementById('titre_logement');
let compteur_titre = document.getElementById('nb_caracteres');
let description_logement = document.getElementById('description_logement');

titre_logement.addEventListener('keyup', (e) => {
    compteur_titre.innerHTML = `${e.target.value.length} / 100`;
    if(e.target.value.length === 100){
        compteur_titre.innerHTML = `${e.target.value.length} / 100 Limite atteinte`;
        titre_logement.classList.remove('is-invalid');
        titre_logement.classList.add('is-valid');
    }
    if(e.target.value.length > 0){
        titre_logement.classList.remove('is-invalid');
        titre_logement.classList.add('is-valid');
    }
})

description_logement.addEventListener('keyup', (e) => {
    if(e.target.value.length > 0){
        titre_logement.classList.remove('is-invalid');
        titre_logement.classList.add('is-valid');
    }
})

//Step 2
// let ville = document.querySelectorAll('.form-check-input');
// console.log(ville);
// ville.forEach(element =>{
//     element.addEventListener('click', (e) =>{
//         console.log(e);
//         e.path[0].checked = true;
//     })
// })

// let ville = document.getElementsByName('ville');
// console.log(ville);
// ville.forEach(element =>{
//     console.log(element.value);
// })

// console.log(document.querySelectorAll('#zone_photo_logement input[type=file]'));