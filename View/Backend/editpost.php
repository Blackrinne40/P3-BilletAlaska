<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Modifier un article</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href=".../styles.css">
</head>
<body>
	<h2>Modifier un article</h2>
	<hr style="width: 50%">
	<form method="post" action=<?= "index.php?action=savepost&id=".$post->getId()?>>
		<div class="form-group">
			<label for="author">Auteur  </label>
	        <input type="text" name="author" id="author" class="form-control" value="<?= htmlspecialchars_decode($post->getAuthor())?>"/>
	        <br/>
	    </div>

	    <div class="form-group">
	        <label for="title">Titre  </label>
	        <input type="text" name="title" id="title" class="form-control" value="<?= htmlspecialchars_decode($post->getTitle())?>"/>
	        <br/>
        </div>

        <div class="form-group">
			<label for="content">Contenu</label>
	        <textarea row='200' col='20' name="content" class="form-control" id="content"><?= htmlspecialchars_decode($post->getContent())?></textarea>
	        <br/>
        </div>

        <div class="form-group">
	        <label for="textresum">Résumé</label>
	        <textarea row='100' col='20' name="textresum" class="form-control" id="textresum"><?= htmlspecialchars_decode($post->getTextResum())?></textarea>
	        <br/>
        </div>

		<button class="btn btn-primary" type="submit">Envoyer</button>
	</form>
	<hr style="width: 50%">
<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>