//Gestion de l'affichage du bouton mobile pour ouvrir sidebar
if(window.innerWidth <= 426){
  //Declaration du bouton
  let sideBarToggle = document.getElementById('menu-toggle');
  //Affichage si mobile
  sideBarToggle.style.display = "initial";

  sideBarToggle.addEventListener('click', (e)=>{
    e.preventDefault();
    //Affichage de l'icone selon clic
    if(sideBarToggle.classList.value == "fa fa-user fa-2x"){
      sideBarToggle.classList.remove('fa');
      sideBarToggle.classList.remove('fa-user');
      sideBarToggle.classList.remove('fa-2x');
      sideBarToggle.classList.add('fa');
      sideBarToggle.classList.add('fa-times');
      sideBarToggle.classList.add('fa-2x');
      document.getElementById('wrapper').classList.toggle("toggled")
    }else{
      sideBarToggle.classList.remove('fa');
      sideBarToggle.classList.remove('fa-times');
      sideBarToggle.classList.remove('fa-2x');
      sideBarToggle.classList.add('fa');
      sideBarToggle.classList.add('fa-user');
      sideBarToggle.classList.add('fa-2x');
      document.getElementById('wrapper').classList.toggle("toggled")
    }
  })
}