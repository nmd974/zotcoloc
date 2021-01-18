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

  //Declaration des differents bouttons de nav

  const sidebarBtn = document.querySelectorAll('.sidebar_item');
  const title_haut = document.getElementById('title_haut');
  const title_bas = document.getElementById('title_bas');
  let precedentEl = "profilNav";
  document.getElementById('profilNav_content').classList.remove("unshow_step");
  sidebarBtn.forEach(element => {
    element.addEventListener("click", (e) => {
      console.log(e.target.id);
      console.log(`${precedentEl}_content`);
      switch (e.target.id) {
        case "profilNav":
          title_haut.innerHTML = "mon profil"
          title_bas.innerHTML = `Gérer mon:<span class="text-green"> profil</span>`
          if(precedentEl !== e.target.id){
            document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
            document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
            precedentEl = e.target.id;
          }
          break;
        case "dashboardNav":
        title_haut.innerHTML = "mon tableau de bord"
        title_bas.innerHTML = `Informations<span class="text-green"> générales</span>`
        if(precedentEl !== e.target.id){
          document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
          document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
          precedentEl = e.target.id;
        }
          break;
        case "favorisNav":
        title_haut.innerHTML = "mon tableau de bord"
        title_bas.innerHTML = `Mes annonces en attente de<span class="text-green"> validation</span>`
        if(precedentEl !== e.target.id){
          document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
          document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
          precedentEl = e.target.id;
        }
          break;
        case "candidatureNav":
        title_haut.innerHTML = "mon tableau de bord"
        title_bas.innerHTML = `Les<span class="text-green"> candidatures</span> a mes annonces`
        if(precedentEl !== e.target.id){
          document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
          document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
          precedentEl = e.target.id;
        }
          break;
        case "annonceNav":
        title_haut.innerHTML = "mon tableau de bord"
        title_bas.innerHTML = `Mes<span class="text-green"> annonces</span>`
        if(precedentEl !== e.target.id){
          document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
          document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
          precedentEl = e.target.id;
        }
          break;
        case "infosNav":
        title_haut.innerHTML = "informations"
        title_bas.innerHTML = `Zotcoloc-<span class="text-green">informations</span>`
        if(precedentEl !== e.target.id){
          document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
          document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
          
          precedentEl = e.target.id;
        }
          break;
      
        default:
          title_haut.innerHTML = "mon profil"
          title_bas.innerHTML = `Gérer mon:<span class="text-green"> profil</span>`
          if(precedentEl !== e.target.id){
            document.getElementById(`${e.target.id}_content`).classList.remove("unshow_step");
            document.getElementById(`${precedentEl}_content`).classList.add("unshow_step");
            precedentEl = e.target.id;
          }
          break;
      }
    })
  })