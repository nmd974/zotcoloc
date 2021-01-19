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
})