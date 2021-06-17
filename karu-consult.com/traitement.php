<?php 
ini_set('display_errors', 1);

// autoloader
spl_autoload_register(function ($name) {
    echo "Tentative de chargement de $name.\n";
    throw new Exception("Impossible de charger $name.");
});

try {
   // instanciation des classes
   include("scripts/Connect.php");
   include("scripts/Patient.php");

   // creation obj PDO
   $db = new Connect();

   # classe Patient
   $patient = new Patient($db);


} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}


# condition ternaire
$action = isset($_POST['action']) ? $_POST["action"]: '';

switch ($action) {
    case 'rdv':
        // traitement formulaire rdv
        $patient->prise_rdv($_POST);    
        break;
    
    default:
        # code...
        break;
}

# test si jour et heure deja pris
if( isset($_POST["rdvFrm"], $_POST["heureFrm"]) ){

    $date = $_POST["rdvFrm"];
    $heure = $_POST["heureFrm"];

    $patient->cherche_date_heure($date, $heure);

}

