<?php
session_start();

ini_set('display_errors', 1);

// autoloader
spl_autoload_register(function ($name) {
    echo "Tentative de chargement de $name.\n";
    throw new Exception("Impossible de charger $name.");
});

try {
    // instanciation des classes
    include("scripts/Connect.php");
    include("scripts/Config.php");
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

$db = new Connect();
$config = new Config($db);


switch ($_POST["nomForm"]) {
    case 'login':
        # code...
        $config->login($_POST);
        break;

    case 'profil':
        # code...
        echo "profil";
        break;

    case 'add':
       # code...
       $config->ajouter_user($_POST);
       break;

    case 'newPass':
        # code...
        $config->new_pass($_POST["email"]);
        break;

    case 'passOk':
        # code...
        $config->update_pass($_POST);
        break;
    
    default:
        # code...
        break;
}
