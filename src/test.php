<?php
$file = 'contenu.php';
$newfile = "libs/archiveLogs/saveContenu".date('Y-m-d_h_i_s').".php";

if (!copy($file, $newfile)) {
    echo "La copie $file du fichier a échoué...\n";
}

$fp = fopen("contenu.php", "r+");
ftruncate($fp, 0);
fclose($fp);
echo("contenu du fichier effacer");
?>