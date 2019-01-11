<?php ob_start(); 

session_destroy();


$content = ob_get_clean();   

require_once('template/body.php'); 

header('Location : index.php');?>