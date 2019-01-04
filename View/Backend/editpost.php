<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Modifier un article</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href=".../styles.css">
</head>
<body>
	<h2>Modifier un article</h2>
	<hr style="width: 50%">
	<form method="post" action=<?= "index.php?action=savepost&id=".$post->getId()?>>

		<label for="author">Auteur  </label>
        <input type="text" name="author" id="author" value="<?= $post->getAuthor() ?>"/>
        
        <br/>

        <label for="title">Titre  </label>
        <input type="text" name="title" id="title" value="<?= $post->getTitle() ?>"/>
        
        <br/>

		<label for="content">Contenu</label>
        <textarea row='50' col='20' name="content" id="content"><?= $post->getContent() ?></textarea>
        
        <br/>

        <label for="textresum">Résumé</label>
        <textarea row='50' col='20' name="textresum" id="textresum"><?= $post->getTextResum() ?></textarea>
        
        <br/>

		<button type="submit">Envoyer</button>
	</form>
	<hr style="width: 50%">
<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>