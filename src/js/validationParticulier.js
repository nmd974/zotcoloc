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
let backStep4 = document.getElementById('back_step4');

//Declaration du titre d'etape à changer
let titleStep = document.getElementById('title_step');

//Declaration des pattern pour la securite et validation formulaire
const pattern_mail = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
const pattern_number = new RegExp("[0-9]{10}");
const pattern_general = new RegExp(/[^<->]/);
const pattern_name = new RegExp("\\w");


//Gestion du clic vers step 2
btnStepEl2.addEventListener("click", (e)=>{

    e.preventDefault();

    //Verification des champs de formulaire
    let validationFormulaire = true;

    // const resultat_query = addUser();
    const email_ajax = document.querySelector('#bloc_step_1 input[name="email"]').value;
    const pass_ajax = document.querySelector('#bloc_step_1 input[name="password"]').value;
    const url = `../controllers/signupParticulier.php?e=${email_ajax}&p=${pass_ajax}`;
    // xmlhttp.open("GET",`../controllers/signupParticulier.php?e=${email_ajax}&p=${pass_ajax}`,true);
    // console.log(resultat_query);
    const res = axios.get(url)
        .then(response => {
        if(response.data === "bool(false)"){
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
            titleStep.innerHTML = `Etape 2/5:<span class="text-green"> Informations générales</span>`;
            timeLineEl.style.width = `25%`;
            window.scrollTo(0,0);

            //Gestion de l'ajout dans le recap des donnees saisies
            let el = document.querySelector('input[name="email"]');
            let recapEl = document.getElementById(`email_recap`);
            let content = document.createElement('p');
            content.innerHTML = `${el.value}`;
            recapEl.append(content);
        }else{
            btnStepEl2.disabled = true;
        }
        })
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
        titleStep.innerHTML = `Etape 3/5:<span class="text-green"> Mes intérêts</span>`;
        timeLineEl.style.width = `50%`;
        window.scrollTo(0,0);

        
        //Gestion de l'ajout dans le recap des donnees saisies
        let  inputList = ["nom_particulier", "penom_particulier", "date_naissance", "date_disponibilite"];
        inputList.forEach(element => {
            let el = document.querySelector(`input[name="${element}"]`);
            let recapEl = document.getElementById(`${element + '_recap'}`);
            let content = document.createElement('p');
            content.innerHTML = `${el.value}`;
            recapEl.append(content);
        })
        
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
        titleStep.innerHTML = `Etape 4/5:<span class="text-green"> Ma ville de recherche</span>`;
        timeLineEl.style.width = `75%`;
        window.scrollTo(0,0);

        //Creation du recap selon les checkboxes checked par categorie
        let categories = ["alimentaire_recap", "centre_interet_recap", "personnalite_recap", "style_vie_recap"];
        categories.forEach(element => {
            let checkboxes = document.querySelectorAll(`input[name="${element}"]:checked`);
            let recapEl = document.getElementById(`${element}`);
            let id_interets = [];
            let libelle_interet = [];
            checkboxes.forEach((checkbox) => {
                id_interets.push(checkbox.id);
                libelle_interet.push(checkbox.value);
                let content = document.createElement('p');
                content.classList.add('me-2');
                content.innerHTML = `${checkbox.labels[0].textContent}`;
                recapEl.append(content);
            })
        });
    }
    
})

//Gestion du clic vers step 5
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
        //Recuperer pour recap
        let checkboxes = document.querySelectorAll(`input[name="ville"]:checked`);
        let recapEl = document.getElementById(`ville_recap`);
        let id_interets = [];
        let libelle_interet = [];
        checkboxes.forEach((checkbox) => {
            id_interets.push(checkbox.id);
            libelle_interet.push(checkbox.labels[0].textContent);
            let content = document.createElement('p');
            content.classList.add('me-2');
            content.innerHTML = `${checkbox.labels[0].textContent}`;
            recapEl.append(content);
        })
    }
    
})

//Gestion des retour en arriere
//Retour vers step 1
backStep1.addEventListener("click", (e)=>{

    e.preventDefault();

    //Verification des champs de formulaire
    let validationFormulaire = true;

    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if(validationFormulaire){
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_1');
        dot.innerHTML = `<i class="fa fa-pencil" aria-hidden="true"></i>`;
        dot.classList.remove('valid_step');
        dot.classList.add('unvalid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl2.classList.remove('show_step');
        blockStepEl2.classList.add('unshow_step');
        blockStepEl1.classList.remove('unshow_step');
        blockStepEl1.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_1');
        dotNext.innerHTML = `<i class="fa fa-pencil" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 1/5:<span class="text-green"> Inscription</span>`;
        timeLineEl.style.width = `0%`;
        window.scrollTo(0,0);
    }
    
})

//Retour vers step 2
backStep2.addEventListener("click", (e)=>{

    e.preventDefault();

    //Verification des champs de formulaire
    let validationFormulaire = true;

    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if(validationFormulaire){
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_2');
        dot.innerHTML = `<i class="fa fa-pencil" aria-hidden="true"></i>`;
        dot.classList.remove('valid_step');
        dot.classList.add('unvalid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl3.classList.remove('show_step');
        blockStepEl3.classList.add('unshow_step');
        blockStepEl2.classList.remove('unshow_step');
        blockStepEl2.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_2');
        dotNext.innerHTML = `<i class="fa fa-pencil" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 2/5:<span class="text-green"> Informations générales</span>`;
        timeLineEl.style.width = `25%`;
        window.scrollTo(0,0);
    }
    
})

//Retour vers step 3
backStep3.addEventListener("click", (e)=>{

    e.preventDefault();

    //Verification des champs de formulaire
    let validationFormulaire = true;

    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if(validationFormulaire){
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_3');
        dot.innerHTML = `<i class="fa fa-pencil" aria-hidden="true"></i>`;
        dot.classList.remove('valid_step');
        dot.classList.add('unvalid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl4.classList.remove('show_step');
        blockStepEl4.classList.add('unshow_step');
        blockStepEl3.classList.remove('unshow_step');
        blockStepEl3.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_3');
        dotNext.innerHTML = `<i class="fa fa-pencil" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 3/5:<span class="text-green"> Mes intérêts</span>`;
        timeLineEl.style.width = `50%`;
        window.scrollTo(0,0);
    }
    
})

//Retour vers step 4
backStep4.addEventListener("click", (e)=>{

    e.preventDefault();

    //Verification des champs de formulaire
    let validationFormulaire = true;

    //Si on rencontre un probleme alors on passe en false et on n'accède pas à la suite
    if(validationFormulaire){
        //On gère l'affichage du bouton
        let dot = document.getElementById('dot_4');
        dot.innerHTML = `<i class="fa fa-pencil" aria-hidden="true"></i>`;
        dot.classList.remove('valid_step');
        dot.classList.add('unvalid_step');
        //On gère l'affichage du bloc de step avec les classes
        blockStepEl5.classList.remove('show_step');
        blockStepEl5.classList.add('unshow_step');
        blockStepEl4.classList.remove('unshow_step');
        blockStepEl4.classList.add('show_step');
        //On redefini le dot vers le point suivant
        let dotNext = document.getElementById('dot_4');
        dotNext.innerHTML = `<i class="fa fa-pencil" aria-hidden="true"></i>`;
        titleStep.innerHTML = `Etape 3/5:<span class="text-green"> Ma ville de recherche</span>`;
        timeLineEl.style.width = `75%`;
        window.scrollTo(0,0);
    }
    
})

// Gestion de l'enregistrement des interets
let btn1 = document.querySelectorAll('div.interets_ajax');
btn1.forEach(element => {
    element.addEventListener("change", (e) => {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log('');
            }
        };
        xmlhttp.open("GET","../controllers/signupParticulier.php?q="+e.path[0].id,true);
        xmlhttp.send();
})

})

// const addUser = () => {
//     //Fonction d'ajout lors du 1er step de l'inscription utilisateur particulier
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         console.log(this);
//         // if (this.readyState == 4 && this.status == 200) {
//         //     console.log(this);
//         // }
//     };
//     const email_ajax = document.querySelector('#bloc_step_1 input[name="email"]').value;
//     const pass_ajax = document.querySelector('#bloc_step_1 input[name="password"]').value;
//     xmlhttp.open("GET",`../controllers/signupParticulier.php?e=${email_ajax}&p=${pass_ajax}`,true);
//     xmlhttp.send();
// }


