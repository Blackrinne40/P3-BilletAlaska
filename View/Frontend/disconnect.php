<?php ob_start(); 

session_start();

session_unset();

session_destroy();
?>

	<h2>Vous êtes déconnecté!</h2>

	<a href="index.php?action=showPage&page=1">Retour sur le site</a>
<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>