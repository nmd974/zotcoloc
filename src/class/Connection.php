<?php 
//connexion bdd
 class Connection{

    public static function getPDO (): PDO
    {
        //Code a activer en local
        // $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        // $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // return $pdo;
        // putenv("CLEARDB_DATABASE_URL=mysql://bef42a8bdfe427:ac306c89@eu-cdbr-west-03.cleardb.net/heroku_ee7443c95f16ffc?reconnect=true");
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $cleardb_server = $cleardb_url["host"];
        $cleardb_username = $cleardb_url["user"];
        $cleardb_password = $cleardb_url["pass"];
        $cleardb_db = substr($cleardb_url["path"],1);
        $active_group = 'default';
        $query_builder = TRUE;
        // Connect to DB
        $pdo = new PDO("mysql:host=".$cleardb_server."; dbname=".$cleardb_db, $cleardb_username, $cleardb_password);
        $pdo->exec('SET NAMES utf8');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    

 }