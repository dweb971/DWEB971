<?php
session_start();
if ($_GET["key"] === "logout") {
		// Détruit toutes les variables de session
	$_SESSION = array();

	/**
	 * session
	 * redirection dashboard
	 */
	$url = $_SERVER["HTTP_HOST"];
	header('Location: https://' . $url . '/backend/index.php');
	exit;
} else {

	if($_SESSION["email"] != ""){
		$page = "Dashboard";
		include("includes/header.php");
?>
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<?php include("includes/content.php"); ?>
			</div>
		</div>
	</div>
	<!--/.wrapper-->
<?php 
	include("includes/footer.php");

	} else {
		$url = $_SERVER["HTTP_HOST"];
		header('Location: https://' . $url . '/backend/index.php');
		exit;
	}

}
?>