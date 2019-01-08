<?php ob_start(); ?>

	<h2 class="dashboard">Bienvenue Admin </h2>
	

	
	<section class="sidebar-sticky col-md-2">
		<ul><h3>Articles</h3>
			<li><a class="nav-link" href="index.php?action=showAllPostsAdmin&page=1">Liste des articles</a></li>
			<li><a class="nav-link" href="index.php?action=createpost">Ajouter un article</a></li>
		</ul>

		<ul><h3>Commentaires</h3>
			<li><a class="nav-link" href="index.php?action=showAllCommentsAdmin&page=1">Liste des commentaires</a></li>
			<li><a class="nav-link" href="index.php?action=showAllReportsComments&page=1">Commentaires signalés</a></li>
		</ul>
	</section>


<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>