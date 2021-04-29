<?php $page = "Connexion"; ?>
<?php include("includes/header.php"); ?>
<?php 
// Détruit toutes les variables de session
$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, on détruit la session.
session_destroy();
?>
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<?php include("includes/forms/connexion.php"); ?>
			</div>
		</div>
	</div><!--/.wrapper-->
<?php include("includes/footer.php"); ?>