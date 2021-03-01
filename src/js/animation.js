var cptA = 0; // Initialisation du compteurA
var cptI = 0; // Initialisation du compteurI
var duree = 4; // Durée en seconde pendant laquelle le compteur ira de 0 à numberA ou numberI
var deltaA = Math.ceil((duree * 1000) / numberA); // On calcule l'intervalle de temps entre chaque rafraîchissement du compteur (durée mise en milliseconde)
var deltaI = Math.ceil((duree * 1000) / numberI); // On calcule l'intervalle de temps entre chaque rafraîchissement du compteur (durée mise en milliseconde)
var nodeA =  document.getElementById("compteurA"); // On récupère notre noeud où sera rafraîchi la valeur du compteur
var nodeI =  document.getElementById("compteurI"); // On récupère notre noeud où sera rafraîchi la valeur du compteur
 
function countdown() {
  
  if( cptA < numberA ) { // Si on est pas arrivé à la valeur finale, on relance notre compteur une nouvelle fois
    nodeA.innerHTML = ++cptA;
     setTimeout(countdown, deltaA);
  }
  
  if( cptI < numberI ) { // Si on est pas arrivé à la valeur finale, on relance notre compteur une nouvelle fois
    nodeI.innerHTML = ++cptI;
     setTimeout(countdown, deltaI);
  }
}
 
setTimeout(countdown, deltaA);
setTimeout(countdown, deltaI);