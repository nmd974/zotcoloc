// let validator;
// const step_1_validator = () => {
//     validator = $("#formulaire_inscription").validate({
//         errorElement: "em",
//         errorPlacement: function ( error, element ) {
//             element.addClass( "is-invalid" );
//             if ( element.prop( "type" ) === "checkbox" ) {
//                 error.insertAfter( element.parent( "label" ) );
//             } else {
//                 error.insertAfter( element );
//             }
//         },
//         highlight: function ( element ) {
//             $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
//         },
//         unhighlight: function ( element ) {
//             $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
//         },
//         rules: {
//             email:{
//                 required: true,
//                 email: true
//             },
//             password:{
//                 required: true
//             },
//             confirm_password:{
//                 required: true,
//                 equalTo: '#password'
//             },
//             nom_particulier:{
//                 required: true
//             }?
//             prenom_particulier:{
//                 required: true
//             }?
//             date_naissance:{
//                 required: true,
//                 dateISO: true
//             }?
//             date_disponibilite:{
//                 required: true,
//                 dateISO: true
//             }
//         }
        
//     })
// }

// // const step_2_validator = () => {
// //     validator = $("#formulaire_inscription").validate({
// //         settings:{
// //             ignore: ":disabled,:hidden"
// //         },
// //         errorElement: "em",
// //         errorPlacement: function ( error, element ) {
// //             element.addClass( "is-invalid" );
// //             if ( element.prop( "type" ) === "checkbox" ) {
// //                 error.insertAfter( element.parent( "label" ) );
// //             } else {
// //                 error.insertAfter( element );
// //             }
// //         },
// //         highlight: function ( element ) {
// //             $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
// //         },
// //         unhighlight: function ( element ) {
// //             $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
// //         },
// //         rules: {
// //             nom_particulier:{
// //                 required: true
// //             }?
// //             prenom_particulier:{
// //                 required: true
// //             }?
// //             date_naissance:{
// //                 required: true,
// //                 dateISO: true
// //             }?
// //             date_disponibilite:{
// //                 required: true,
// //                 dateISO: true
// //             }
// //         }
// //     })
// // }
// //LISTE DES NAMES
// /*
//  email
//  password
//  confirm_password
//  nom_particulier
//  prenom_particulier
//  date_naissance
//  date_disponibilite
//  interets[]
//  villes[]
//  */


// //******************************************************************* */
// //REGLES COMMUNES
// //******************************************************************* */
// //Modification des messages d'erreurs
// jQuery.extend(jQuery.validator.messages, {
//     required: "Ce champ est obligatoire",
//     remote: "votre message",
//     email: "Veuillez saisir une adresse email valide (ex: xxx.yyy@zzz.com)",
//     url: "votre message",
//     date: "Veuillez saisir une date conforme",
//     dateISO: "votre message",
//     number: "votre message",
//     digits: "Seuls les chiffres sont autorisés",
//     creditcard: "votre message",
//     equalTo: "Les mots de passe sont différents",
//     accept: "votre message",
//     maxlength: jQuery.validator.format("Ce champ doit contenir au moins {0} caractères."),
//     minlength: jQuery.validator.format("{0} caractères minimum."),
//     rangelength: jQuery.validator.format("{0} caractères min </br> {1} caractères maximum."),
//     range: jQuery.validator.format("votre message  entre {0} et {1}."),
//     max: jQuery.validator.format("votre message  inférieur ou égal à {0}."),
//     min: jQuery.validator.format("votre message  supérieur ou égal à {0}.")
// });