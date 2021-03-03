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
    // let validationFormulaire = true;
    // let input_text_list = ['titre_logement', 'description_logement'];
    // let input_list = ['titre_logement', 'description_logement', 'type_logement', 'surface_logement'];
    // let input_number_list = ['surface_logement'];
    
    // //Par défaut les input type number seront = 0 si rien
    // input_number_list.forEach(element => {
    //     if(document.getElementById(`${element}`).value === ""){
    //         document.getElementById(`${element}`).value = 0;
    //         document.getElementById(`${element}`).classList.remove('is-invalid');
    //         document.getElementById(`${element}`).classList.add('is-valid');
    //     }
    // })
    // input_text_list.forEach(element => {
    //     if(document.getElementById(`${element}`).value === ""){
    //         document.getElementById(`${element}`).classList.remove('is-valid');
    //         document.getElementById(`${element}`).classList.add('is-invalid');
    //     }
    // })
    // input_number_list.forEach(element => {
    //     if(document.getElementById(`${element}`).value === "" && (document.getElementById(`${element}`).value < 0 || document.getElementById(`${element}`).value > 10000)){
    //         console.log(document.getElementById(`${element}`).value);
    //         document.getElementById(`${element}`).classList.remove('is-valid');
    //         document.getElementById(`${element}`).classList.add('is-invalid');
    //     }
    // })
    // //On empeche l'injection de code js
    // input_list.forEach(element => {
    //     if(pattern_general.test(document.getElementById(`${element}`).value)){
    //         document.getElementById(`${element}`).classList.remove('is-valid');
    //         document.getElementById(`${element}`).classList.add('is-invalid');
    //     }
    // })
    // //On verifie ceux qui ne sont pas identifié en invalid
    // input_list.forEach(element => {
    //     let changeClass = true;
    //     document.getElementById(`${element}`).classList.forEach(classeEl => {
    //         if(classeEl === "is-invalid"){
    //             changeClass = false;
    //             validationFormulaire = false;
    //         }
    //     })
    //     if(changeClass){
    //       document.getElementById(`${element}`).classList.add('is-valid');  
    //     }
    // })
    validator_create_annonce();
    if($('#create_annonce').valid()){
        //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
        // if(validationFormulaire){
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
        // //On gere ici l'ajout dans le recap
        // input_list.forEach(element => {
        //     $(`#${element}_recap`).append(`<p id="${element}_recap_content">${document.getElementById(`${element}`).value}</p>`);
        // })
        
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_2');
        dotNext.innerHTML = `<i class="fa fa-hourglass-start" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 2/5:<span class="text-green">Localisation et photos</span>`;
        timeLineEl.style.width = `25%`;
        window.scrollTo(0,0);
        // }
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
    // if(validationFormulaire){
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
        //On ajoute dans le recap
        // let input_list = ['meuble', 'aides_logement'];
        // let input_list_array = ['equipements_logement', 'regles'];
        
        // input_list.forEach(element =>{
        //     $(`#${element}_recap`).append(`<p id="${element}recap_content">${document.getElementById(`${element}`).value}</p>`);
        // })
        // input_list_array.forEach(element => {
        //     let regles = document.querySelectorAll(`input[name="regles"]:checked`);
        //     // $(`#${element}`)
        // })
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
        document.getElementById('create_annonce').submit();
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



//Ici on gere l'ajout d'une nouvelle chambre sur le formulaire de creation d'une annonce
let cptChambre = 2;
let newArray = '[]';
$('#addChambre').on('click', () => {
    $('#zoneChambre').append(`
    <h4 class="mb-2">Chambre #${cptChambre}</h4>
        <i class="fa fa-plus-square" aria-hidden="true" id="addChambre"></i>
    <!--Titre de la chambre-->
        <div class="col-md-12">
            <label for="titre_chambre" class="form-label">Titre de la chambre</label>
            <input type="text" class="form-control" id="titre_chambre" name="titre_chambre[]" value="<?php if(isset($_POST['titre_chambre'])){
                echo $_POST['titre_chambre'];
            }?>">
        </div>

        <!--Description de la chambre-->
        <div class="col-md-12">
            <label for="description_chambre" class="form-label">Desciption de la chambre</label>
            <textarea class="form-control" id="description_chambre" name="description_chambre[]" rows="3"  value="<?php if(isset($_POST['description_chambre'])){echo $_POST['description_chambre'];}?>"></textarea>
        </div>

        <!--Surface de la chambre-->
        <div class="col-md-12 input-group mt-3">
            <label for="surface_chambre" class="input-group-text mb-1">Surface Totale</label>
            <input type="number" class="form-control me-5 mb-1" id="surface_chambre" name="surface_chambre_${cptChambre}" value="0">

            <!--Type de chambre-->
            <div class="col-md-12">
                <div class="d-flex align-items-center"> 
                    <p>Type de chambre : </p>
                    <input type="radio" name="type_chambre_${cptChambre}" class="btn-check" id="type_chambre_${cptChambre}_oui" value="Chambre principale">
                            <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_${cptChambre}_oui">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Chambre principale
                        </label>
                        <input type="radio" name="type_chambre_${cptChambre}" class="btn-check" id="type_chambre_${cptChambre}_non" value="Chambre secondaire">
                            <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_${cptChambre}_non">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            Chambre secondaire
                        </label>
                </div>  
            </div>
        </div>

        <!--Photo de la chambre-->
        <div class="col-md-12 mt-3">
            <label for="photo_chambre">ajoutez au moins une photo de la chambre</label>
            <input type="file" class="form-control-file" name="photos_chambre_${cptChambre}[]">
        </div>

        <div class="col-md-12">
        <div class="d-flex align-items-center"> 
            <p>Disponible à la location ?</p>
            <input type="radio" name="a_louer_${cptChambre}" class="btn-check" id="a_louer_oui_${cptChambre}" value="1">
                    <label class="btn btn-outline-success me-2 mb-2" for="a_louer_oui_${cptChambre}">
                    <i class="fa fa-check" aria-hidden="true"></i>
                        Oui
                </label>
                <input type="radio" name="a_louer_${cptChambre}" class="btn-check" id="a_louer_non_${cptChambre}" value="0">
                    <label class="btn btn-outline-success me-2 mb-2" for="a_louer_non_${cptChambre}">
                    <i class="fa fa-times" aria-hidden="true"></i>
                        Non
                </label>
        </div>  
    </div>

        <!--Date disponibilité-->
        <div class="col-md-12 mt-3">
            <label for="date_disponibilite" class="form-label">Date de idsponibilité</label><br>
            <input type="date" name="date_disponibilite[]" class="form-control" id="date_disponibilite"
                value="<?php if(isset($_POST['date_disponibilite'])){echo $_POST['date_disponibilite'];}?>"
            >
        </div>

        <!--Durée du bail-->
        <div class="col-md-12 mt-3">
            <label for="duree_bail" class="form-label">Durée du bail</label>
            <input type="number" class="form-control" id="duree_bail" name="duree_bail[]" placeholder="en mois" value="<?php if(isset($_POST['duree_bail'])){echo $_POST['duree_bail'];}?>">
        </div>

        <!--loyer-->
        <div class="col-md-12 mt-3">
            <label for="loyer" class="form-label">Loyer</label>
            <input type="number" class="form-control" id="loyer" name="loyer[]" placeholder="en €" value="<?php if(isset($_POST['loyer'])){echo $_POST['loyer'];}?>">
        </div>

        <!--charge-->
        <div class="col-md-12 mt-3">
            <label for="charge" class="form-label">Charge</label>
            <input type="number" class="form-control" id="charge" name="charges[]" placeholder="en €" value="<?php if(isset($_POST['charge'])){echo $_POST['charge'];}?>">
        </div>

        <!--caution-->
        <div class="col-md-12 mt-3">
            <label for="caution" class="form-label">Caution</label>
            <input type="number" class="form-control" id="caution" name="caution[]" placeholder="en €" value="<?php if(isset($_POST['caution'])){echo $_POST['caution'];}?>">
        </div>

        <!--frais dossier-->
        <div class="col-md-12 mt-3">
            <label for="frais_dossier" class="form-label">Frais dossier</label>
            <input type="number" class="form-control" id="frais_dossier" name="frais_dossier[]" placeholder="en €" value="<?php if(isset($_POST['frais_dossier'])){echo $_POST['frais_dossier'];}?>">
        </div>

        <!--equipement chambre-->
        <div class="col-md-12 mt-3">
            <p>Equipements privés:</p>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="equipement_prive">
        <?php if(!$equipements[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
            <?php foreach($equipements as $equipement):?>
                <input type="checkbox" name="equipements_chambre_${cptChambre}[]" class="btn-check" value="<?= $equipement->id ?>" id="chambre_${cptChambre}_<?= $equipement->id ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="chambre_${cptChambre}_<?= $equipement->id ?>">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <?= $equipement->libelle_equipement ?>
                </label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>
        </div>
        
    `)
    cptChambre++;
    newArray = newArray + '[]';
})