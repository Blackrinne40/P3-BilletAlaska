<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Modifier mon commentaire</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href=".../styles.css">
</head>
<body>
	<h2>Modifier un commentaire</h2>
	<hr style="width: 50%">
	<form method="post" action=<?="./index.php?action=saveComment&id=".$comment->getId() ?>>
		<div class="form-group">
			<label for="author">Author  </label>
	        <input type="text" name="author" id="author" class="form-control" value=<?= $comment->getAuthor() ?> />
	        <br/>
	    </div>

	    <div class="form-group">
			<label for="comment">Commentaire</label>
	        <textarea row='50' col='20' name="comment" class="form-control" id="comment"><?= $comment->getComment() ?></textarea>
	        <br/>
	    </div>

		<button class="btn btn-primary" type="submit">Envoyer</button>
	</form>
	<hr style="width: 50%">
<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>