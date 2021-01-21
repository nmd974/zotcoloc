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
        }
    })
    input_number_list.forEach(element => {
        if(document.getElementById(`${element}`).value === "" && (document.getElementById(`${element}`).value < 0 || document.getElementById(`${element}`).value > 10000)){
            console.log(document.getElementById(`${element}`).value);
            document.getElementById(`${element}`).classList.remove('is-valid');
            document.getElementById(`${element}`).classList.add('is-invalid');
        }
    })
    //On empeche l'injection de code js
    input_list.forEach(element => {
        if(pattern_general.test(document.getElementById(`${element}`).value)){
            document.getElementById(`${element}`).classList.remove('is-valid');
            document.getElementById(`${element}`).classList.add('is-invalid');
        }
    })
    //On verifie ceux qui ne sont pas identifié en invalid
    input_list.forEach(element => {
        let changeClass = true;
        document.getElementById(`${element}`).classList.forEach(classeEl => {
            if(classeEl === "is-invalid"){
                changeClass = false;
                validationFormulaire = false;
            }
        })
        if(changeClass){
          document.getElementById(`${element}`).classList.add('is-valid');  
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
            $(`#${element}_recap`).append(`<p id="${element}_recap_content">${document.getElementById(`${element}`).value}</p>`);
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

    let ville = document.getElementsByName('ville');
    let labels = document.querySelectorAll('#bloc_step_2 .btn-outline-success');
    
    // ville.forEach(element => {
    //     validationFormulaire = false;
    //     console.log(element.checked);
    //     if(element.checked){
    //         validationFormulaire = true;
    //     }
    // })
    // if(!validationFormulaire){
    //     labels.forEach(element => {
    //         element.classList.remove('btn-outline-success');
    //         element.classList.add('btn-outline-danger');
    //     })
    // }

    // let photos = document.querySelectorAll('#zone_photo_logement input[type=file]');
    // photos.forEach(element => {
    //     validationFormulaire = false;
    //     if(element.files[0].length === 1){
    //         validationFormulaire = true;
    //         element.classList.add('is-valid');
    //     }
    // })

    // if(!validationFormulaire){
    //     photos.forEach(element => {
    //         element.classList.remove('is-valid');
    //         element.classList.add('is-invalid');
    //     })
    // }
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
        //On ajoute le resultat 
        // ville.forEach(element => {
        //     if(element.checked){
        //         $('#ville_recap').append(`<p id="ville_recap_content">${document.getElementById(`${element}`).id}</p>`);
        //     }
        // })
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
        //On ajoute dans le recap
        let input_list = ['meuble', 'aides_logement'];
        let input_list_array = ['equipements_logement', 'regles'];
        
        input_list.forEach(element =>{
            $(`#${element}_recap`).append(`<p id="${element}recap_content">${document.getElementById(`${element}`).value}</p>`);
        })
        // input_list_array.forEach(element => {
        //     let regles = document.querySelectorAll(`input[name="regles"]:checked`);
        //     // $(`#${element}`)
        // })
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_4');
        dotNext.innerHTML = `<i class="fa fa-hourglass-start" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 4/5:<span class="text-green"> Profils idéal et chambre</span>`;
        timeLineEl.style.width = `75%`;
        window.scrollTo(0,0);
    
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
    input_number.forEach(element => {
        if(element.value === ""){
            element.value = 0;
            element.classList.remove('is-invalid');
            element.classList.add('is-valid');
        }
    })
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
backStep1.addEventListener("click", (e)=>{

    e.preventDefault();
    let input_list = ['titre_logement', 'description_logement', 'type_logement', 'surface_logement'];
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
        //Gestion du recap on va enlever le contenu
        input_list.forEach(element => {
            $(`#${element}_recap_content`).remove();
        })
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
        //Suppression de l'ancien ajout
        $('#ville_recap_content').remove();
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

    //Verification des champs de formulaire
    let validationFormulaire = true;

    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if(validationFormulaire){
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
    }
    
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



