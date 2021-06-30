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
   include("scripts/Resthome.php");



} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

$db = new Connect();

$resthome = new Resthome($db);


if( isset($_POST["form"]))
{
    $nomF = $_POST["form"];
} else {
    // connexion a voir
    $resthome->login($_POST);
}

switch ($nomF) {
    case 'addR':
        # code...
        $resthome->addR($_POST);
        break;
    case 'delR' :
        # delete recette
        $resthome->delR($_POST["id"]);
        break;
    
    default:
        # code...
        break;
}