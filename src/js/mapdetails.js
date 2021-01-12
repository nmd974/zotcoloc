
var lat = -20.89342005859303;
var lon = 55.45163310991814;
var macarte = null;
var villes = {
"Saint-Denis": { "lat": -20.890447, "lon": 55.454915 }
};
// Fonction d'initialisation de la carte
function initMap() {
   
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    macarte = L.map('mapdetails').setView([lat, lon], 16);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 18
    }).addTo(macarte);
     //création du marqueur
     for (ville in villes) {
var marker = L.marker([villes[ville].lat, villes[ville].lon]).addTo(macarte);
// Nous ajoutons la popup. A noter que son contenu (ici la variable ville) peut être du HTML
    marker.bindPopup(ville);   
}  
}
window.onload = function(){
// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
initMap();
};


