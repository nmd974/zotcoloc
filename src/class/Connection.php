<?php 
 class Connection{

    public static function getPDO (): PDO
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    

 }