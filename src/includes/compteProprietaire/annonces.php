<div class="d-flex flex-column justify-content-center align-items-center unshow_step" id="annonceNav_content">
<?php require_once(dirname(dirname(__DIR__)).'/controllers/annonces/recherches/getData.php');?>

<?php if($count['nb_rslt'] == 0):?>
    <img src="../images/no-annonce.png" class="img_moncompte">
    <button class="btn btn-success mt-4 w-25">Ajouter une annonce</button>
<?php else:?>
    <table class="table table-striped table-responsive text-center">
    <thead>
    <tr>
    <th scope="col">Etat</th>
    <th scope="col">Titre</th>
    <th scope="col">Ville</th>
    <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <th scope="row" class="bg-danger">1</th>
    <td>Mark</td>
    <td>Otto</td>
    <td>@mdo</td>
    </tr>
    <tr>
    <th scope="row">2</th>
    <td>Jacob</td>
    <td>Thornton</td>
    <td>@fat</td>
    </tr>
    <tr>
    <th scope="row">3</th>
    <td colspan="2">Larry the Bird</td>
    <td>@twitter</td>
    </tr>
    </tbody>
    </table>
<?php endif;?>
</div>