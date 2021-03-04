//GEstion dynamique du nombre de caractères saisis
let titre_logement = document.getElementById('titre_logement');
let compteur_titre = document.getElementById('nb_caracteres');
let compteur_desc = document.getElementById('nb_caracteres_desc');
let description_logement = document.getElementById('description_logement');

titre_logement.addEventListener('keyup', (e) => {
    compteur_titre.innerHTML = `${e.target.value.length} / 100 caractères`;
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
    compteur_desc.innerHTML = `${e.target.value.length} / 500 caractères`;
    if(e.target.value.length === 100){
        compteur_desc.innerHTML = `${e.target.value.length} / 500 Limite atteinte`;
        description_logement.classList.remove('is-invalid');
        description_logement.classList.add('is-valid');
    }
    if(e.target.value.length > 0){
        description_logement.classList.remove('is-invalid');
        description_logement.classList.add('is-valid');
    }
})

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

//Declaration des boutons de retour
let backStep1 = document.getElementById('back_step1');
let backStep2 = document.getElementById('back_step2');
let backStep3 = document.getElementById('back_step3');
let backStep4 = document.getElementById('back_step4');

//Declaration du titre d'etape à changer
let titleStep = document.getElementById('title_step');

//Patterns REGEX
const pattern_general = new RegExp(/<(.*)>/);

//Gestion du clic vers step 2
btnStepEl2.addEventListener("click", (e)=>{
    
    e.preventDefault();
    
    //Verification des champs de formulaire
    validator_create_annonce();
    if($('#create_annonce').valid()){
        //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
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
    if($('#create_annonce input[name="photos_logement[]"]')[0].files.length <= 6){
        $('#photos_logement').addClass("is-valid");
        //Verification des champs de formulaire
        if($('#create_annonce').valid()){
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
    }else{
        $('#photos_logement').addClass("is-invalid");
    }
    
})

//Gestion du clic vers step 4
btnStepEl4.addEventListener("click", (e)=>{
    
    e.preventDefault();
    if($('#create_annonce').valid()){
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
        titleStep.innerHTML = `Etape 4/5:<span class="text-green"> Profil idéal</span>`;
        timeLineEl.style.width = `75%`;
        window.scrollTo(0,0);
    }
    
})

//Gestion du clic vers step 4
btnStepEl5.addEventListener("click", (e)=>{
    
    e.preventDefault();
    
    //Verification des champs de formulaire
    let validationFormulaire = true;
    let inputs = document.querySelectorAll('#bloc_step_4 input[class="form-control"]');
    let input_number = document.querySelectorAll('#bloc_step_4 input[type="number"]');
    inputs.forEach(element => {
        if(pattern_general.test(element.value)){
            element.classList.remove('is-valid');
            element.classList.add('is-invalid');
            validationFormulaire = false;
        }
    })
    //On met à 0 les champs number non saisis
    input_number.forEach(element => {
        if(element.value === ""){
            element.value = 0;
            element.classList.remove('is-invalid');
            element.classList.add('is-valid');
        }
    })
    if($('#create_annonce').valid()){
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
            titleStep.innerHTML = `Etape 5/5:<span class="text-green">Ajout de(s) chambre(s)</span>`;
            timeLineEl.style.width = `100%`;
            window.scrollTo(0,0);
        }
    }
    
})

//Gestion de l'envoie du formulaire
document.getElementById('enregistrer_annonce').addEventListener('click', (e) => {
    e.preventDefault();
    if($('#create_annonce').valid()){
        validator.destroy();
        document.getElementById('create_annonce').submit();
    }
})

//Blocage de l'appuie sur la touche entrée
$("#create_annonce").keypress(function(e) {
    //Enter key
    if (e.which == 13) {
        return false;
    }
});


// //Gestion des retour en arriere
// //Retour vers step 1
backStep1.addEventListener("click", (e)=>{
    
    e.preventDefault();
    //On gère l'affichage du bouton
    let dot = document.getElementById('dot_1');
    dot.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
    dot.classList.remove('valid_step');
    dot.classList.add('unvalid_step');
    //On gère l'affichage du bloc de step avec les classes
    blockStepEl2.classList.remove('show_step');
    blockStepEl2.classList.add('unshow_step');
    blockStepEl1.classList.remove('unshow_step');
    blockStepEl1.classList.add('show_step');
    //On redefini le dot vers le point suivant
    let dotNext = document.getElementById('dot_1');
    dotNext.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
    titleStep.innerHTML = `Etape 1/4:<span class="text-green"> Description</span>`;
    timeLineEl.style.width = `0%`;
    window.scrollTo(0,0);
    
})

// //Retour vers step 2
backStep2.addEventListener("click", (e)=>{
    
    e.preventDefault();
    
    //Verification des champs de formulaire
    
    //On gère l'affichage du bouton
    let dot = document.getElementById('dot_2');
    dot.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
    dot.classList.remove('valid_step');
    dot.classList.add('unvalid_step');
    //On gère l'affichage du bloc de step avec les classes
    blockStepEl3.classList.remove('show_step');
    blockStepEl3.classList.add('unshow_step');
    blockStepEl2.classList.remove('unshow_step');
    blockStepEl2.classList.add('show_step');
    //On redefini le dot vers le point suivant
    let dotNext = document.getElementById('dot_2');
    dotNext.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
    titleStep.innerHTML = `Etape 2/5:<span class="text-green">Localisation et photos</span>`;
    timeLineEl.style.width = `25%`;
    window.scrollTo(0,0);
    
})

// //Retour vers step 3
backStep3.addEventListener("click", (e)=>{
    
    e.preventDefault();
    
    //On gère l'affichage du bouton
    let dot = document.getElementById('dot_3');
    dot.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
    dot.classList.remove('valid_step');
    dot.classList.add('unvalid_step');
    //On gère l'affichage du bloc de step avec les classes
    blockStepEl4.classList.remove('show_step');
    blockStepEl4.classList.add('unshow_step');
    blockStepEl3.classList.remove('unshow_step');
    blockStepEl3.classList.add('show_step');
    //On redefini le dot vers le point suivant
    let dotNext = document.getElementById('dot_3');
    dotNext.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
    titleStep.innerHTML = `Etape 3/5:<span class="text-green"> Information générales</span>`;
    timeLineEl.style.width = `50%`;
    window.scrollTo(0,0);
    
})

// //Retour vers step 4
backStep4.addEventListener("click", (e)=>{
    e.preventDefault();
    //On gère l'affichage du bouton
    let dot = document.getElementById('dot_4');
    dot.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
    dot.classList.remove('valid_step');
    dot.classList.add('unvalid_step');
    //On gère l'affichage du bloc de step avec les classes
    blockStepEl5.classList.remove('show_step');
    blockStepEl5.classList.add('unshow_step');
    blockStepEl4.classList.remove('unshow_step');
    blockStepEl4.classList.add('show_step');
    //On redefini le dot vers le point suivant
    let dotNext = document.getElementById('dot_4');
    dotNext.innerHTML = `<i class="fa fa-pencil text-white" aria-hidden="true"></i>`;
    titleStep.innerHTML = `Etape 4/5:<span class="text-green"> Profils idéal et chambre</span>`;
    timeLineEl.style.width = `75%`;
    window.scrollTo(0,0);
})



// //Gestion de l'ajout d'un nouveau bloc image logement
// let nb_blocs = 1;
// $('#addPhoto').on("click", () => {

//     $('#zone_photo_logement').append(`
//         <div class="d-flex" id="bloc_logement_${nb_blocs}">
//         <input type="file" class="form-control" name="photos_logement[]" required>
//         <button type="button" class="btn btn-danger me-4" id="del_bloc_logement_${nb_blocs}">
//         <i class="fa fa-trash" aria-hidden="true"></i>
//         </button>
//         </div>
//     `);
//     nb_blocs++;
//     $(`#del_bloc_logement_${nb_blocs}`).on('click', () => {
//         $(`#bloc_logement_${nb_blocs}`).remove();
//         nb_blocs--;
//     });

//     $(`input[name^="photos_logement]`).rules('add', {
//         required: true,
//         extension: "jpg|jpeg|png",
//         messages:{
//             accept: "Seuls les formats jpg / jpeg / png sont autorisés"
//         }
//     });
// });
// let cptChambre = 1;
// let cptPhotos = 1;
// //Gestion de l'ajout d'un nouveau bloc image chambre
// $(`#addPhotoChambre_${cptChambre}`).on("click", () => {
//     $(`#zone_photo_chambre_${cptChambre}`).append(`
//         <div class="d-flex" id="bloc_logement_${cptChambre}">
//         <input type="file" class="form-control" name="photos_chambre_${cptChambre}[]" required>
//         <button type="button" class="btn btn-danger me-4" id="del_bloc_logement_${cptChambre}_${cptPhotos}">
//         <i class="fa fa-trash" aria-hidden="true"></i>
//         </button>
//         </div>
//     `);
//     cptPhotos++;
//     $(`#del_bloc_logement_${cptChambre}_${cptPhotos}`).on('click', () => {
//         $(`#bloc_logement_${cptChambre}`).remove();
//         cptPhotos--;
//     });

//     $(`input[name^="photos_chambre_${cptChambre}]`).rules('add', {
//         required: true,
//         extension: "jpg|jpeg|png",
//         messages:{
//             accept: "Seuls les formats jpg / jpeg / png sont autorisés"
//         }
//     });
// });

{/* <div class="col-md-12 mt-3 d-flex flex-column">
<label for="photo_chambre_${cptChambre}_${cptPhotos}">Ajoutez au moins une photo de la chambre</label>
<input type="file" id="photo_chambre_${cptChambre}_${cptPhotos}" class="form-control-file" name="photos_chambre_${cptChambre}[]">
</div> */}

