<?php ob_start(); ?>

	<h2>Ajouter un article</h2>
	<hr style="width: 50%">
	<form method="post" action=<?="index.php?action=addpost"?>>
		
		<div class="form-group">
			<label for="author">Auteur </label>
	        <input type="text" name="author" class="form-control" id="author"/><br/>
	    </div>
	    <div class="form-group">
			<label for="title">Titre </label>
	        <input type="text" name="title" class="form-control" id="title"/><br/>
	    </div>
	    <div class="form-group">
			<label for="textresum">Résumé du chapitre</label>
	        <textarea row='50' col='20' name="textresum" class="form-control" id="textresum"></textarea><br/>
	    </div>
	    <div class="form-group">
			<label for="content">Contenu</label>
	        <textarea row='50' col='20' name="content" class="form-control" id="content"></textarea><br/>
    	</div>

		<button class="btn btn-primary" type="submit">Publier</button>
	</form>
	<hr style="width: 50%">
<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>