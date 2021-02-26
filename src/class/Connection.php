<?php 
//connexion bdd
 class Connection{

    public static function getPDO (): PDO
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function getPDOheroku (): PDO
    {
        $pdo = new PDO('mysql://eu-cdbr-west-03.cleardb.net;dbname=heroku_ee7443c95f16ffc;charset=utf8', 'bef42a8bdfe427', 'ac306c89');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    

 }