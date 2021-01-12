//Mettre une variable globale pour savoir si refresh sans validation = perte de données
let formulaireEnvoye = false;
// window.onbeforeunload = () => {
//     alert("Souhaitez-vous continuer?");
// }

//Gestion de la timeline
let timeLineEl = document.getElementById('line_time_progress2');

//Declaration des boutons suivants
//let btnStepEl1 = document.getElementById('step_1');
let btnStepEl2 = document.getElementById('step_2');
let btnStepEl3 = document.getElementById('step_3');
let btnStepEl4 = document.getElementById('step_4');
let btnStepEl5 = document.getElementById('step_5');

//Declaration des blocs de step
let blockStepEl1 = document.getElementById('bloc_step_1');
let blockStepEl2 = document.getElementById('bloc_step_2');
let blockStepEl3 = document.getElementById('bloc_step_3');
let blockStepEl4 = document.getElementById('bloc_step_4');
let blockStepEl5 = document.getElementById('bloc_step_5');

//Declaration du titre d'etape à changer
let titleStep = document.getElementById('title_step');

//Gestion du clic vers step 2
btnStepEl2.addEventListener("click", (e)=>{

    e.preventDefault();

    //Verification des champs de formulaire
    let validationFormulaire = true;

    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if(validationFormulaire){
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_1');
        dot.innerHTML = `<i class="fa fa-check" aria-hidden="true"></i>`;
        dot.classList.remove('unvalid_step');
        dot.classList.add('valid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl1.classList.remove('show_step');
        blockStepEl1.classList.add('unshow_step');
        blockStepEl2.classList.remove('unshow_step');
        blockStepEl2.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_2');
        dotNext.innerHTML = `<i class="fa fa-hourglass-start" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 2/5:<span class="text-green">Localisation et photos</span>`;
        timeLineEl.style.width = `25%`;
        window.scrollTo(0,0);
    }
    
})

//Gestion du clic vers step 3
btnStepEl3.addEventListener("click", (e)=>{

    e.preventDefault();

    //Verification des champs de formulaire
    let validationFormulaire = true;

    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if(validationFormulaire){
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_2');
        dot.innerHTML = `<i class="fa fa-check" aria-hidden="true"></i>`;
        dot.classList.remove('unvalid_step');
        dot.classList.add('valid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl2.classList.remove('show_step');
        blockStepEl2.classList.add('unshow_step');
        blockStepEl3.classList.remove('unshow_step');
        blockStepEl3.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_3');
        dotNext.innerHTML = `<i class="fa fa-hourglass-start" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 3/5:<span class="text-green"> Information générales</span>`;
        timeLineEl.style.width = `50%`;
        window.scrollTo(0,0);
    }
    
})

//Gestion du clic vers step 4
btnStepEl4.addEventListener("click", (e)=>{

    e.preventDefault();

    //Verification des champs de formulaire
    let validationFormulaire = true;

    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if(validationFormulaire){
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_3');
        dot.innerHTML = `<i class="fa fa-check" aria-hidden="true"></i>`;
        dot.classList.remove('unvalid_step');
        dot.classList.add('valid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl3.classList.remove('show_step');
        blockStepEl3.classList.add('unshow_step');
        blockStepEl4.classList.remove('unshow_step');
        blockStepEl4.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_4');
        dotNext.innerHTML = `<i class="fa fa-hourglass-start" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 4/5:<span class="text-green"> Profils idéal et chambre</span>`;
        timeLineEl.style.width = `75%`;
        window.scrollTo(0,0);
    }
    
})

//Gestion du clic vers step 4
btnStepEl5.addEventListener("click", (e)=>{

    e.preventDefault();

    //Verification des champs de formulaire
    let validationFormulaire = true;

    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if(validationFormulaire){
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_4');
        dot.innerHTML = `<i class="fa fa-check" aria-hidden="true"></i>`;
        dot.classList.remove('unvalid_step');
        dot.classList.add('valid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl4.classList.remove('show_step');
        blockStepEl4.classList.add('unshow_step');
        blockStepEl5.classList.remove('unshow_step');
        blockStepEl5.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_5');
        dotNext.innerHTML = `<i class="fa fa-hourglass-start" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 5/5:<span class="text-green"> Récapitulatif</span>`;
        timeLineEl.style.width = `100%`;
        window.scrollTo(0,0);
    }
    
})





