let validator;
jQuery.validator.addMethod(
    "regex",
     function(value, element, regexp) {
         if (regexp.constructor != RegExp)
            regexp = new RegExp(regexp);
         else if (regexp.global)
            regexp.lastIndex = 0;
            return this.optional(element) || regexp.test(value);
     },"erreur expression reguliere"
  );

const signup_particulier_validator = () => {
    validator = $("#formulaire_inscription").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            email:{
                required: true,
                email: true
            },
            password:{
                required: true
            },
            confirm_password:{
                required: true,
                equalTo: '#password'
            },
            nom_particulier:{
                required: true
            },
            prenom_particulier:{
                required: true
            },
            date_naissance:{
                required: true,
                dateISO: true
            },
            date_disponibilite:{
                required: true,
                dateISO: true
            }
        }
        
    })
}
const validator_signup_proprietaire = () => {
    validator = $("#proprietaire_inscription").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            email:{
                required: true,
                email: true
            },
            password:{
                required: true
            },
            confirm_password:{
                required: true,
                equalTo: '#password'
            },
            nom_proprietaire:{
                required: true
            },
            prenom_proprietaire:{
                required: true
            },
            telephone:{
                required: true,
                digits: true
            }
        }
        
    })
}
const validator_create_annonce = () => {
    validator = $("#create_annonce").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            titre_logement:{
                required: true,
                maxlength: 100
            },
            description_logement:{
                required: true,
                maxlength: 500
            },
            type_logement:{
                required: true
            },
            meuble:{
                digits: true,
                min: 0,
                max: 1
            },
            aides_logement:{
                digits: true,
                min: 0,
                max: 1
            },
            ville:{
                required: true
            },
            surface_logement:{
                digits: true,
                min : 0
            },
            age_max:{
                digits: true,
                min: 0,
                max: 120
            },
            age_min:{
                digits: true,
                min: 0,
                max: 120
            },
            "photos_logement[]":{
                extension: "jpg|jpeg|png",
                required: true
            },
            'titre_chambre[]':{
                required: true
            },
            "description_chambre[]":{
                required: true
            },
            "surface_chambre[]":{
                digits: true,
                min : 0
            },
            "frais_dossier[]":{
                digits: true,
                min: 0
            },
            "caution[]":{
                digits: true,
                min: 0
            },
            "charges[]":{
                digits: true,
                min: 0
            },
            "loyer[]":{
                digits: true,
                min: 0
            },
            "duree_bail[]":{
                digits: true,
                max: 36,
                min: 1
            },
            "date_disponibilite[]":{
                dateISO: true
            },
            "a_louer_1[]":{
                digits: true
            },
            "photos_chambre_1[]":{
                required: true,
                extension: "jpg|jpeg|png"
            }
            
        }
        //TODO : Faire lors de la creation d'une nouvelle chambre, l'ajout d'une rule pour ce form
        
    })
}
const searchHome = () => {
    validator = $("#searchHome").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            search_room:{
                "regex": /[a-zA-Z0-9 ]+/
            }
        }
        
    })
}
const searchAll = () => {
    validator = $("#searchAll").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            search_room:{
                "regex": /[a-zA-Z0-9 ]+/
            }
        }
        
    })
}

/* Variable pour la page login */
const loginPage = () => {
    validator = $("#loginPage").validate({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            element.addClass( "is-invalid" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element ) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        },
        rules: {
            email:{
                required: true,
                email: true
            },
            password:{
                required: true
            }
        }
        
    })
}

//LISTE DES NAMES
/*
 email
 password
 confirm_password
 nom_particulier
 prenom_particulier
 date_naissance
 date_disponibilite
 interets[]
 villes[]
 */


//******************************************************************* */
//REGLES COMMUNES
//******************************************************************* */
//Modification des messages d'erreurs
jQuery.extend(jQuery.validator.messages, {
    required: "Ce champ est obligatoire",
    email: "Veuillez saisir une adresse email valide (ex: xxx.yyy@zzz.com)",
    date: "Veuillez saisir une date conforme",
    dateISO: "Veuillez saisir une date conforme (jour/mois/annee)",
    digits: "Seuls les chiffres sont autorisés",
    equalTo: "Les mots de passe sont différents",
    password: "mot passe incorrecte",
    maxlength: jQuery.validator.format("Ce champ doit contenir au moins {0} caractères."),
    minlength: jQuery.validator.format("{0} caractères minimum."),
    max: jQuery.validator.format("Ce champ doit être inférieur ou égal à {0}."),
    min: jQuery.validator.format("Ce champ doit être supérieur ou égal à {0}.")
});

{/* <h4 class="mb-2">Chambre #${cptChambre}</h4>
<i class="fa fa-plus-square" aria-hidden="true" id="addChambre"></i>
<!--Titre de la chambre-->
<div class="col-md-12">
    <label for="titre_chambre" class="form-label">Titre de la chambre</label>
    <input type="text" class="form-control" id="titre_chambre" name="titre_chambre[]">
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
        <div class="mb-3" id="zone_photo_chambre_${cptChambre}">
            <input type="file" class="form-control" name="photos_chambre_${cptChambre}[]" multiple required>
        </div>
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
</div> */}