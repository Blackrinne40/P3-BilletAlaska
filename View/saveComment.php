<?php
	require_once(./Controler/CommentController.php);

	if(array_key_exists($newcomment, $_GET) && $newcomment>0){
		$newcomment -> saveComment($commentId);
		header('Location : index.php');
	}
	else
	{
		echo ' Erreur : Votre modification de message n\'a pas été enregistrée.'
	}

?>