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
