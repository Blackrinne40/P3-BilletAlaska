<?php ob_start(); ?>

	<h2>Ajouter un article</h2>
	<hr style="width: 50%">
	<form method="post" action=<?="#"?>>
		<label for="title">Titre </label>
        <input type="text" name="title" id="title"/>
        
        <br/>
		<label for="textresum">Résumé du chapitre</label>
        <textarea row='50' col='20' name="textresum" id="textresum"></textarea>
        
        <br/>
		<label for="content">Contenu</label>
        <textarea row='50' col='20' name="content" id="content"></textarea>
        
        <br/>

		<button type="submit">Publier</button>
	</form>
	<hr style="width: 50%">
<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>