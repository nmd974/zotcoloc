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
                validator.destroy();
                document.getElementById('proprietaire_inscription').submit();
            }
        };
        xmlhttp.open("POST", "http://127.0.0.1:8000/src/controllers/utilisateurs/getEmail.php?email=" + email, true);
        xmlhttp.send();
    };
});