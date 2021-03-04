//Mettre une variable globale pour savoir si refresh sans validation = perte de données
let formulaireEnvoye = false;

//Gestion de la timeline
let timeLineEl = document.getElementById('line_time_progress');

//Declaration des boutons suivants
let btnStepEl1 = document.getElementById('step_1');
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


//Declaration du titre d'etape à changer
let titleStep = document.getElementById('title_step');

//Declaration des pattern pour la securite et validation formulaire
const pattern_mail = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
const pattern_number = new RegExp("[0-9]{10}");
const pattern_general = new RegExp(/<(.*)>/);
const pattern_name = new RegExp("\\w");


//Gestion du clic vers step 2
btnStepEl2.addEventListener("click", (e)=>{
    
    e.preventDefault();
    //On declenche ici le validator
    signup_particulier_validator();
    if($('#formulaire_inscription').valid()){
        
        //Verification si email en doublon
        var email = document.getElementById('email').value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 202) {
                document.getElementById("valid_email").innerHTML = this.responseText;
                document.getElementById("valid_email").style.color = 'red';
                document.getElementById('email').classList.add('is-invalid');             
            }
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("valid_email").style.color = 'green';
                document.getElementById('email').classList.add('is-valid');
                document.getElementById("valid_email").innerHTML = this.responseText;
                
                //On gère l'affichage du bouton
                let dot = document.getElementById('dot_1');
                dot.innerHTML = `<i class="fa fa-check text-white" aria-hidden="true"></i>`;
                dot.classList.remove('unvalid_step');
                dot.classList.add('valid_step');
                
                //On gère l'affichage du bloc de step avec les classes
                blockStepEl1.classList.remove('show_step');
                blockStepEl1.classList.add('unshow_step');
                blockStepEl2.classList.remove('unshow_step');
                blockStepEl2.classList.add('show_step');
                
                //On redefini le dot vers le point suivant
                let dotNext = document.getElementById('dot_2');
                dotNext.innerHTML = `<i class="fa fa-hourglass-start text-white" aria-hidden="true"></i>`;
                titleStep.innerHTML = `Etape 2/5:<span class="text-green"> Informations générales</span>`;
                timeLineEl.style.width = `25%`;
                window.scrollTo(0,0);
                
                // validator.destroy();
            }
        };
        xmlhttp.open("POST", `${location.origin}/src/controllers/utilisateurs/getEmail.php?email=` + email, true);
        xmlhttp.send();
        
    }
})

//Gestion du clic vers step 3
btnStepEl3.addEventListener("click", (e)=>{
    
    e.preventDefault();
    
    //Verification des champs de formulaire
    // step_2_validator();
    if($('#formulaire_inscription').valid()){
        //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_2');
        dot.innerHTML = `<i class="fa fa-check text-white" aria-hidden="true"></i>`;
        dot.classList.remove('unvalid_step');
        dot.classList.add('valid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl2.classList.remove('show_step');
        blockStepEl2.classList.add('unshow_step');
        blockStepEl3.classList.remove('unshow_step');
        blockStepEl3.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_3');
        dotNext.innerHTML = `<i class="fa fa-hourglass-start text-white" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 3/5:<span class="text-green"> Mes intérêts</span>`;
        timeLineEl.style.width = `50%`;
        window.scrollTo(0,0);
        // validator.destroy();
        
        
    }
})

//Gestion du clic vers step 4
btnStepEl4.addEventListener("click", (e)=>{
    
    e.preventDefault();
    
    //Verification des champs de formulaire
    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if($('#formulaire_inscription').valid()){
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_3');
        dot.innerHTML = `<i class="fa fa-check text-white" aria-hidden="true"></i>`;
        dot.classList.remove('unvalid_step');
        dot.classList.add('valid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl3.classList.remove('show_step');
        blockStepEl3.classList.add('unshow_step');
        blockStepEl4.classList.remove('unshow_step');
        blockStepEl4.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_4');
        dotNext.innerHTML = `<i class="fa fa-hourglass-start text-white" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 4/5:<span class="text-green"> Ma ville de recherche</span>`;
        timeLineEl.style.width = `75%`;
        window.scrollTo(0,0);
        
        
    }
    
})

//Gestion du clic vers step 5
btnStepEl5.addEventListener("click", (e)=>{
    
    e.preventDefault();
    
    //Verification des champs de formulaire
    let validationFormulaire = true;
    
    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if($('#formulaire_inscription').valid()){
        /*************************************************************************************************************************** */
        /*************************************************************************************************************************** */
        /*************************************************************************************************************************** */
        /******************************************** */
        //GESTION DU RECAPITULATIF
        /******************************************** */
        function htmlEncode(str){
            return String(str).replace(/[^\w. ]/gi, function(c){
                return '&#'+c.charCodeAt(0)+';';
            });
        }
        $("#bloc_step_5").append(`
        <div id="content_created">
        <div class="arrow_return d-flex align-items-center mb-5" id="back_step4">
        <i class="fa fa-arrow-left fa-2x text-dark" aria-hidden="true"></i>
        <p class="text-secondary m-0 poppins h5 ms-4">Précédent</p>
        </div>
        
        <!--Infos générales-->
        <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
        <div class="border-two ps-3">
        <p class="text-secondary m-0 poppins h5">Mes informations générales</p>
        </div>
        </div>
        </div>
        <div class="col-md-12 d-flex" id="email_recap">
        <p class="me-3">Email :</p>
        
        </div>
        <div class="col-md-12 d-flex" id="nom_particulier_recap">
        <p class="me-3">Nom :</p>
        
        </div>
        
        <div class="col-md-12 d-flex" id="prenom_particulier_recap">
        <p class="me-3">Prénom :</p>
        
        </div>
        
        <!-- date naissance-->
        <div class="col-md-12 d-flex" id="date_naissance_recap">
        <p class="me-3">Date de naissance :</p>
        
        </div>
        
        <!-- Emmenagement-->
        <div class="col-md-12 d-flex" id="date_disponibilite_recap">
        <p class="me-3">Date de disponibilité :</p>
        
        </div>
        
        
        
        <!--Alimentaire-->
        <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
        <div class="border-two ps-3">
        <p class="text-secondary m-0 poppins h5">Mes habitudes alimentaires</p>
        </div>
        </div>
        </div>
        <div class="d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group" id="habitudes_alimentaires_recap">
        
        </div>
        
        <!--centres intérêts-->
        <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
        <div class="border-two ps-3">
        <p class="text-secondary m-0 poppins h5">Mes centres d'intérêts</p>
        </div>
        </div>
        </div>
        <div class="d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group" id="centres_interets_recap">
        
        </div>
        
        <!--Personnalites-->
        <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
        <div class="border-two ps-3">
        <p class="text-secondary m-0 poppins h5">Ma personnalite</p>
        </div>
        </div>
        </div>
        <div class="d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group" id="personnalite_recap">
        
        </div>
        
        <!--Style de vie-->
        <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
        <div class="border-two ps-3">
        <p class="text-secondary m-0 poppins h5">Mon style de vie</p>
        </div>
        </div>
        </div>
        <div class="d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group" id="style_vie_recap">
        
        </div>
        
        <!--Ville selection-->
        <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
        <div class="border-two ps-3">
        <p class="text-secondary m-0 poppins h5">Ma sélection de villes</p>
        </div>
        </div>
        </div>
        <div class="d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group" id="ville_recap">
        
        </div>
        
        <!--button validation inscription-->
        <div class="col-12 text-end my-4">
        <button type="submit" class="btn w-25 bg-green text-white mr-5" name="ajouter" id="inscription_btn">Je m'inscris</button>
        </div>
        
        </div>
        
        `)
        
        //STEP 1
        let el = document.querySelector('input[name="email"]');
        let recapEl = document.getElementById(`email_recap`);
        let content = document.createElement('p');
        content.innerHTML = htmlEncode(`${el.value}`);
        recapEl.append(content);
        //STEP 2
        let  inputList = ["nom_particulier", "prenom_particulier", "date_naissance", "date_disponibilite"];
        inputList.forEach(element => {
            let el = document.getElementById(`${element}`);
            let recapEl = document.getElementById(`${element + '_recap'}`);
            let content = document.createElement('p');
            content.innerHTML = htmlEncode(`${el.value}`);
            recapEl.append(content);
        })
        //STEP 3
        let categories = ["habitudes_alimentaires", "centres_interets", "personnalite", "style_vie"];
        categories.forEach(element => {
            let checkboxes = document.getElementById(`${element}`).querySelectorAll('input:checked');
            let recapEl = document.getElementById(`${element}_recap`);
            checkboxes.forEach((checkbox) => {
                let content = document.createElement('p');
                content.classList.add('me-2');
                content.innerHTML = htmlEncode(`${checkbox.labels[0].textContent}`);
                console.log(checkbox.labels[0].textContent);
                recapEl.append(content);
            })
        });
        //STEP 4
        let checkboxes = document.getElementById('ville_liste').querySelectorAll('input:checked');
        recapEl = document.getElementById(`ville_recap`);
        checkboxes.forEach((checkbox) => {
            let content = document.createElement('p');
            content.classList.add('me-2');
            content.innerHTML = htmlEncode(`${checkbox.labels[0].textContent}`);
            recapEl.append(content);
        })
        
        /*GESTION DU CLIC RETOUR EN ARRIERE*/
        
        //Retour vers step 4
        let backStep4 = document.getElementById('back_step4');
        backStep4.addEventListener("click", ()=>{
            $('#content_created').remove();
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
            titleStep.innerHTML = `Etape 3/5:<span class="text-green"> Ma ville de recherche</span>`;
            timeLineEl.style.width = `75%`;
            window.scrollTo(0,0);
        })
        /*************************************************************************************************************************** */
        /*************************************************************************************************************************** */
        /*************************************************************************************************************************** */
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_4');
        dot.innerHTML = `<i class="fa fa-check text-white" aria-hidden="true"></i>`;
        dot.classList.remove('unvalid_step');
        dot.classList.add('valid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl4.classList.remove('show_step');
        blockStepEl4.classList.add('unshow_step');
        blockStepEl5.classList.remove('unshow_step');
        blockStepEl5.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_5');
        dotNext.innerHTML = `<i class="fa fa-hourglass-start text-white" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 5/5:<span class="text-green"> Récapitulatif</span>`;
        timeLineEl.style.width = `100%`;
        window.scrollTo(0,0);
    };
    
})

//Gestion des retour en arriere
//Retour vers step 1
backStep1.addEventListener("click", (e)=>{
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
    titleStep.innerHTML = `Etape 1/5:<span class="text-green"> Inscription</span>`;
    timeLineEl.style.width = `0%`;
    window.scrollTo(0,0);
    
})

//Retour vers step 2
backStep2.addEventListener("click", (e)=>{
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
    titleStep.innerHTML = `Etape 2/5:<span class="text-green"> Informations générales</span>`;
    timeLineEl.style.width = `25%`;
    window.scrollTo(0,0);
})

//Retour vers step 3
backStep3.addEventListener("click", (e)=>{
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
    titleStep.innerHTML = `Etape 3/5:<span class="text-green"> Mes intérêts</span>`;
    timeLineEl.style.width = `50%`;
    window.scrollTo(0,0);
    
})

