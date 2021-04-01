<?php 
ini_set('display_errors', 1);

// autoloader
spl_autoload_register(function ($name) {
    echo "Tentative de chargement de $name.\n";
    throw new Exception("Impossible de charger $name.");
});

try {
   // instanciation des classes
   include("scripts/Patient.php");


} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}


$action = $_POST['action'];

if($action === 'rdv'){

    // traitement formulaire rdv
    $patient = new Patient($_POST);
}

print_r($patient);