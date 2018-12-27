<?php ob_start(); ?>

	<h2 class="dashboard">Bienvenue Admin </h2>

	
	<p>Que voulez-vous faire aujourd'hui?</p>

	<ul><h3>Articles</h3>
		<li><a href="index.php?action=showAllPostsAdmin&page=0">Liste des articles</a></li>
		<li><a href="addpost.php">Ajouter un article</a></li>
	</ul>

	<ul><h3>Commentaires</h3>
		<li><a href="index.php?action=showAllCommentsAdmin&page=0">Liste des commentaires</a></li>
		<li><a href="index.php?action=showAllReportsComments&page=0">Commentaires signalés</a></li>
	</ul>

<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>