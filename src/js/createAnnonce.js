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

//Patterns REGEX
const pattern_general = new RegExp(/<(.*)>/);

//Gestion du clic vers step 2
btnStepEl2.addEventListener("click", (e)=>{

    e.preventDefault();

    //Verification des champs de formulaire
    let validationFormulaire = true;
    let input_text_list = ['titre_logement', 'description_logement'];
    let input_list = ['titre_logement', 'description_logement', 'type_logement', 'surface_logement'];
    let input_number_list = ['surface_logement'];

    //Par défaut les input type number seront = 0 si rien
    input_number_list.forEach(element => {
        if(document.getElementById(`${element}`).value === ""){
            document.getElementById(`${element}`).value = 0;
            document.getElementById(`${element}`).classList.remove('is-invalid');
            document.getElementById(`${element}`).classList.add('is-valid');
        }
    })
    input_text_list.forEach(element => {
        if(document.getElementById(`${element}`).value === ""){
            document.getElementById(`${element}`).classList.remove('is-valid');
            document.getElementById(`${element}`).classList.add('is-invalid');
            validationFormulaire = false;
        }
    })
    input_number_list.forEach(element => {
        if(document.getElementById(`${element}`).value === "" && (document.getElementById(`${element}`).value < 0 || document.getElementById(`${element}`).value > 10000)){
            console.log(document.getElementById(`${element}`).value);
            document.getElementById(`${element}`).classList.remove('is-valid');
            document.getElementById(`${element}`).classList.add('is-invalid');
            validationFormulaire = false;
        }
    })
    input_list.forEach(element => {
        if(pattern_general.test(document.getElementById(`${element}`).value)){
            document.getElementById(`${element}`).classList.remove('is-valid');
            document.getElementById(`${element}`).classList.add('is-invalid');
            validationFormulaire = false;
        }
    })
    
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
        //On gere ici l'ajout dans le recap
        input_list.forEach(element => {
            $(`#${element}_recap`).append(`<p>${document.getElementById(`${element}`).value}</p>`);
        })
        
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
    let input_number = document.querySelectorAll('#bloc_step_1 input[type=number]');
    console.log(input_number);
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
    let input_number = document.querySelectorAll('input[type=number]');
    console.log(input_number);

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


// //Gestion des retour en arriere
// //Retour vers step 1
// backStep1.addEventListener("click", (e)=>{

//     e.preventDefault();

//     //Verification des champs de formulaire
//     let validationFormulaire = true;

//     //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
//     if(validationFormulaire){
//         //On gère l'affichage du bouton
//         let dot = document.getElementById('dot_1');
//         dot.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
//         dot.classList.remove('valid_step');
//         dot.classList.add('unvalid_step');
//         //On gère l'affichage du bloc de step avec les classes
//         blockStepEl2.classList.remove('show_step');
//         blockStepEl2.classList.add('unshow_step');
//         blockStepEl1.classList.remove('unshow_step');
//         blockStepEl1.classList.add('show_step');
//         //On redefini le dot vers le point suivant
//         let dotNext = document.getElementById('dot_1');
//         dotNext.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
//         titleStep.innerHTML = `Etape 1/4:<span class="text-green"> Description</span>`;
//         timeLineEl.style.width = `0%`;
//         window.scrollTo(0,0);
//     }
    
// })

// //Retour vers step 2
// backStep2.addEventListener("click", (e)=>{

//     e.preventDefault();

//     //Verification des champs de formulaire
//     let validationFormulaire = true;

//     //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
//     if(validationFormulaire){
//         //On gère l'affichage du bouton
//         let dot = document.getElementById('dot_2');
//         dot.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
//         dot.classList.remove('valid_step');
//         dot.classList.add('unvalid_step');
//         //On gère l'affichage du bloc de step avec les classes
//         blockStepEl3.classList.remove('show_step');
//         blockStepEl3.classList.add('unshow_step');
//         blockStepEl2.classList.remove('unshow_step');
//         blockStepEl2.classList.add('show_step');
//         //On redefini le dot vers le point suivant
//         let dotNext = document.getElementById('dot_2');
//         dotNext.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
//         titleStep.innerHTML = `Etape 2/5:<span class="text-green">Localisation et photos</span>`;
//         timeLineEl.style.width = `25%`;
//         window.scrollTo(0,0);
//     }
    
// })

// //Retour vers step 3
// backStep3.addEventListener("click", (e)=>{

//     e.preventDefault();

//     //Verification des champs de formulaire
//     let validationFormulaire = true;

//     //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
//     if(validationFormulaire){
//         //On gère l'affichage du bouton
//         let dot = document.getElementById('dot_3');
//         dot.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
//         dot.classList.remove('valid_step');
//         dot.classList.add('unvalid_step');
//         //On gère l'affichage du bloc de step avec les classes
//         blockStepEl4.classList.remove('show_step');
//         blockStepEl4.classList.add('unshow_step');
//         blockStepEl3.classList.remove('unshow_step');
//         blockStepEl3.classList.add('show_step');
//         //On redefini le dot vers le point suivant
//         let dotNext = document.getElementById('dot_3');
//         dotNext.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
//         titleStep.innerHTML = `Etape 3/5:<span class="text-green"> Information générales</span>`;
//         timeLineEl.style.width = `50%`;
//         window.scrollTo(0,0);
//     }
    
// })

// //Retour vers step 4
// backStep4.addEventListener("click", (e)=>{

//     e.preventDefault();

//     //Verification des champs de formulaire
//     let validationFormulaire = true;

//     //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
//     if(validationFormulaire){
//         //On gère l'affichage du bouton
//         let dot = document.getElementById('dot_4');
//         dot.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
//         dot.classList.remove('valid_step');
//         dot.classList.add('unvalid_step');
//         //On gère l'affichage du bloc de step avec les classes
//         blockStepEl5.classList.remove('show_step');
//         blockStepEl5.classList.add('unshow_step');
//         blockStepEl4.classList.remove('unshow_step');
//         blockStepEl4.classList.add('show_step');
//         //On redefini le dot vers le point suivant
//         let dotNext = document.getElementById('dot_4');
//         dotNext.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
//         titleStep.innerHTML = `Etape 4/5:<span class="text-green"> Profils idéal et chambre</span>`;
//         timeLineEl.style.width = `75%`;
//         window.scrollTo(0,0);
//     }
    
// })



//Gestion de l'ajout d'un nouveau bloc image
let addPhotoZone = document.getElementById('zone_photo_logement');
let btnAddPhoto = document.getElementById('addPhoto');

btnAddPhoto.addEventListener("click", (e) => {
    console.log(e);
    let input = document.createElement('input');
    input.setAttribute("type", 'file');
    input.setAttribute("name", 'photos_logement[]');
    input.setAttribute("class", 'form-control');
    addPhotoZone.append(input);
});



