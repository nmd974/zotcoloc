<?php  
 
 //if(!isset($_GET['modifier']) || $_GET['modifier'] ! == $logement['logement'])
 
	session_start();
	$dbh = new PDO('mysql:host=localhost;  root@localhost= zotcoloc', 'root', '');

	// initialize variables
	
    if (isset($_GET['id'])) {
        if (!empty($_POST)) {
            $id = isset($_POST['id']) ? $_POST['id'] : NULL;
            $logement = "";
            $profil = "";
            $ville = "";
            $utilisateur ="" ;
            $titre_logements = "";
            $description_logement = "";
            $surface_logement = "";
            $meuble = "";
            $eligible_aides ="";
            $candidature_facile = "";
            $age_max ="" ;
            $age_min = "";
            $date_creation = "";
            $statut = "";
            $date_maj ="";
            $id = 0;
            $update = false;

            if (isset($_POST['save'])) {
                
                $logement = $_POST['logement'];
                $profil = $_POST['profil'];
                $ville = $_POST['ville'];
                $utilisateur = $_POST['utilisateur'];
                $titre_logements = $_POST['titre_logements'];
                $description_logement = $_POST['description_logement'];
                $surface_logement = $_POST['surface_logement'];
                $meuble = $_POST['meuble'];
                $eligible_aides = $_POST['eligible_aides'];
                $candidature_facile = $_POST['candidature_facile'];
                $age_max = $_POST['age_max'];
                $age_min = $_POST['age_min'];
                $date_creation = $_POST['date_creation'];
                $statut = $_POST['statut'];
                $date_maj = $_POST['date_maj'];

                $_SESSION['message'] = "Address saved"; 
                header('location: index.php');
            }

        }
    
    
    }