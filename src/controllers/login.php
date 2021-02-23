<?php 

function login ()
{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
    $error = null;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $email = $_POST['emailUser'];
        //  Récupération de l'utilisateur et de son pass hashé
        $req = $pdo->prepare('SELECT id, password FROM utilisateurs WHERE email = :email');
        $req->execute(array(
        'email' => $email));
        $resultat = $req->fetch();

        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['PasswordUser'], $resultat['password']);
        
        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['emailUser'] = $email;
                echo 'Vous êtes connecté !';
            }
            else {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }

        return array(true, $req);
    }catch(PDOException $e){
        $error = $e->getMessage();
        return array(false, $error);
    }



}

