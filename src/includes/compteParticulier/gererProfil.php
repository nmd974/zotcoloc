<div id="profilNav_content">
  <!--Affichage de la photo de profil en mobile-->
  <div class="d-flex flex-column justify-content-center align-items-center unshow_step" id="photo_profil_mobile">
    <a href="#">
      <div class="photo_profil" style="background-image: url(../images/profile.jpg);"></div>
      <div class="d-flex align-items-center justify-content-center mt-2 w-100">
        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
        <p class="icone_photo text-dark">Editer photo</p>
      </div>
    </a>
    <p class="nav_title_profil">Mirella</p>
    <p class="arobase_pseudo">@Mirellax</p>
  </div>

  <!--Debut des accordions-->
  <div class="accordion accordion-flush shadow" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          Mon profil de coloc
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <!--Nom-->
          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">@</span>
        </div>
        <input type="text" class="form-control" disabled placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <!--Prenom-->
      <div class="col-md-12">
          <label for="prenom_particulier" class="form-label">Prénom*</label><br>
          <input type="text" name="prenom_particulier" class="form-control" id="prenom_particulier"
              value="<?php if(isset($_POST['prenom_particulier'])){echo $_POST['prenom_particulier'];}?>"
          >
      </div>
      <!--Date de naissance-->
      <div class="col-md-12">
          <label for="date_naissance" class="form-label">Date naissance*</label><br>
          <input type="date" name="date_naissance" class="form-control" id="date_naissance"
              value="<?php if(isset($_POST['date_naissance'])){echo $_POST['date_naissance'];}?>"
          >
      </div>
      <!--Date d'emmenagement-->
      <div class="col-md-12">
          <label for="date_disponibilite" class="form-label">Date d'emmenagement*</label><br>
          <input type="date" name="date_disponibilite" class="form-control" id="date_disponibilite"
              value="<?php if(isset($_POST['date_disponibilite'])){echo $_POST['date_disponibilite'];}?>"
          >
      </div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
          Accordion Item #2
        </button>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
          Accordion Item #3
        </button>
      </h2>
      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
      </div>
    </div>
  </div>
</div>
