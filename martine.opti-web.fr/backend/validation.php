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
    include("../scripts/Connect.php");
    include("../scripts/AdminRM.php");
    include("../scripts/AdminDA.php");

} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

$db = new Connect();
$admin = new AdminDA($db);
$gestion = new AdminRM($db);


$action = $_POST["fname"];
switch ($action) {
    case 'fsignup':
        # register        
        $gestion->add_user($_POST);
        break;
    case 'fnpass':
        # new password admin and prof
        $admin->passe_new($_POST);
        break;
    case 'fconnexion':
        # connexion
        $admin->connexion($_POST);
        break;
    case 'fexo': 
        print_r($_POST);
        break;
    default:
        # code...
        break;
}


