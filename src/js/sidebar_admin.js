//Declaration du bouton
let sideBarToggle = document.getElementById('menu-toggle');
//Fonctions d'affichage selon etat du bouton
const toggleClose = () => {
  sideBarToggle.classList.remove('fa');
  sideBarToggle.classList.remove('fa-times');
  sideBarToggle.classList.remove('fa-2x');
  sideBarToggle.classList.add('fa');
  sideBarToggle.classList.add('fa-user');
  sideBarToggle.classList.add('fa-2x');
  document.getElementById('wrapper').classList.toggle("toggled")
}
const toggleOpen = () => {
  sideBarToggle.classList.remove('fa');
  sideBarToggle.classList.remove('fa-user');
  sideBarToggle.classList.remove('fa-2x');
  sideBarToggle.classList.add('fa');
  sideBarToggle.classList.add('fa-times');
  sideBarToggle.classList.add('fa-2x');
  document.getElementById('wrapper').classList.toggle("toggled")
}
//Gestion de l'affichage du bouton mobile pour ouvrir sidebar
if(window.innerWidth <= 426){
  //Affichage si mobile
  sideBarToggle.style.display = "initial";
  sideBarToggle.addEventListener('click', (e)=>{
    e.preventDefault();
    //Affichage de l'icone selon clic
    if(sideBarToggle.classList.value == "fa fa-user fa-2x"){
      toggleOpen();
    }else{
      toggleClose();
    }
  })
}
//Declaration des differents bouttons de nav
const sidebarBtn = document.querySelectorAll('.sidebar_item');
const title_haut = document.getElementById('title_haut');
const title_bas = document.getElementById('title_bas');
let precedentEl = "tables_tab";
document.getElementById('tables_tab_content').classList.remove("unshow_step");
sidebarBtn.forEach(element => {
  element.addEventListener("click", (e) => {
    switch (e.target.id) {
      case "tables_tab":
      title_haut.innerHTML = "Administration du site"
      title_bas.innerHTML = `Gestion des<span class="text-green"> tables</span>`
      if(precedentEl !== e.target.id){
        document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
        document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
        precedentEl = e.target.id;
      }
      break;
      case "utilisateurs_tab":
      title_haut.innerHTML = "Administration du site"
      title_bas.innerHTML = `Gestion des<span class="text-green"> utilisateurs</span>`
      if(precedentEl !== e.target.id){
        document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
        document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
        precedentEl = e.target.id;
      }
      break;
      case "annonces_tab":
      title_haut.innerHTML = "Administration du site"
      title_bas.innerHTML = `Gestion des<span class="text-green"> annonces</span>`
      if(precedentEl !== e.target.id){
        document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
        document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
        precedentEl = e.target.id;
      }
      break;
      case "logs_tab":
      title_haut.innerHTML = "Administration du site"
      title_bas.innerHTML = `Affichage des<span class="text-green"> logs internes</span>`
      if(precedentEl !== e.target.id){
        document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
        document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
        precedentEl = e.target.id;
      }
      break;

      default:
      title_haut.innerHTML = "Administration du site"
      title_bas.innerHTML = `Gérer mon:<span class="text-green"> profil</span>`
      if(precedentEl !== e.target.id){
        document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
        document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
        precedentEl = e.target.id;
      }
      break;
    }
    if(window.innerWidth <= 426){
      toggleClose();
    }
  })
})