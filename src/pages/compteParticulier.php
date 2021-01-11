<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<!-- Sidebar -->
<div class="bg-light border-right shadow" id="sidebar-wrapper">
    <div class="sidebar-heading">Start Bootstrap </div>
    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
    </div>
</div>
<!-- /#sidebar-wrapper -->
<div class="container-fluid" id="wrapper-content">
    <!-- inscription-->
    <div class="container">
        <p id="description" class="lead">
        <h1 class="text-center" id="title">Formulaie inscription Particulier </h1>
    </div>
    <div class="container mt-5">
        <!-- <div class="timeline"> -->
        <ul class="d-flex justify-content-around">
            <li class="step">inscription</li>

        </ul>
        <div class="d-flex justify-content-center align-items-center">
            <div class="line_time position-relative">
                <div class="line_time_progress position-relative"></div>
            </div>
        </div>
        <ul class="d-flex justify-content-around">
            <li class="dots"></li>
            <li class="dots"></li>
            <li class="dots"></li>
            <li class="dots"></li>
            <li class="dots"></li>
        </ul>
        <!-- </div> -->
    </div>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Email*</label>
                <input type="email" class="form-control" id="inputEmail4" name="emailUser" value="<?php if(isset($_POST['emailUser'])){
                    echo $_POST['emailUser'];
                }?>">
            </div>
            <div class="col-md-12">
                <label for="confirmPassword" class="form-label">Mot de passe*</label>
                <input type="password" class="form-control" id="confirmPassword" name="passwordUser">
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Retaper Mot de passe*</label>
                <input type="password" class="form-control" id="inputPassword4" name="repass">
            </div>
            <div class="col-md-12 mt-4">
                *Champs obligatoires
            </div>
            <!--button validation inscription-->
            <div class="col-12 text-end my-4">
                <button type="submit" class="btn btn-primary mr-5" name="inscription_01"
                    formmethod="post">suivant</button>
            </div>
        </form>
    </div>
    <i class="fa fa-user fa-2x" id="menu-toggle" style="color: black;" aria-hidden="true"></i>
</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>