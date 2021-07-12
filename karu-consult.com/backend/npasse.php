<?php 
ini_set('display_errors', 1);

// autoloader
spl_autoload_register(function ($name) {
    echo "Tentative de chargement de $name.\n";
    throw new Exception("Impossible de charger $name.");
});

try {
   // instanciation des classes
   include("../scripts/Connect.php");
   include("../scripts/Patient.php");
   include("classes/Backend.php");

   // creation obj PDO
   $db = new Connect();

   # classe Patient
   $patient = new Patient($db);
   $back = new Backend($db);


} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}


print_r($_GET);

