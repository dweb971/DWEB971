<?php
$page = "sansrdv";
?>
<?php
include("includes/head.php");

?>
        <div class="container">
            <ul class="list-group list-group-horizontal">
                <li>
                    <a href="index.php" title="Page d'accueil">Accueil</a>
                </li>
                <li>
                    Sans rendez-vous.
                </li>
            </ul>
        </div>
        <div class="container">
            <h1>Sans Rendez-vous</h1>
            <h2>date du jour</h2>
            <h3 class="alert alertG alertR">25 places</h3>
            <div class="row">
                <div class="col-lg-2">
                   
                </div>
                <div class="col-lg-8">
                    <?php
                        include("includes/forms/patient.php");
                    ?>
                </div>
                <div class="col-lg-2">
                    
                </div>
            </div>

            
            <div>
                <p>
                    * : Champs obligatoires.
                </p>
            </div>
            
        </div>
 <?php
    include("includes/footer.php");
?>