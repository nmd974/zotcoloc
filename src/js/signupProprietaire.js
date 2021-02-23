document.getElementById('ajouter_proprietaire').addEventListener("click", (e)=>{
    
    e.preventDefault();
    //Verification si email en doublon
    validator_signup_proprietaire();
    if($('#proprietaire_inscription').valid()){
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
                
                //Gestion de l'ajout dans le recap des donnees saisies
                let el = document.querySelector('input[name="email"]');
                let recapEl = document.getElementById(`email_recap`);
                let content = document.createElement('p');
                content.innerHTML = `${el.value}`;
                recapEl.append(content);
                // validator.destroy();
            }
        };
        xmlhttp.open("POST", "http://127.0.0.1:8000/src/controllers/utilisateurs/getEmail.php?email=" + email, true);
        xmlhttp.send();
    };
});