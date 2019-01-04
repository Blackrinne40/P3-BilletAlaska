<?php ob_start(); ?>

	<h2>Liste des articles</h2>

		<table class="allPostsAdminTable">
			<thead>
			<tr><div>
					<td>Articles</td>
					<td>Actions</td>

				</div></tr>
			</thead>
			<tbody>
		<?php foreach($postsAdmin as $post) {?>
			<tr><div>
				<td><h3><strong><?=htmlspecialchars($post->getTitle())?></strong></h3></td>
				<td><a href=<?= "index.php?action=post&id=". $post->getId(). "&page=0" ?>> Consulter le billet</a>
					<a href=<?="index.php?action=editpost&id=".$post->getId()?>>Modifier le billet</a>
					<a href=<?="index.php?action=deletepost&id=".$post->getId()?>>Supprimer le billet</a>
				</td>
			</div></tr>
			</tbody>
		<?php } ?>

			</table>

		<?php if ($page > 1) { ?>
        <div><a class="stylebutton" href= <?= "index.php?action=showAllPostsAdmin&page=" .($page - 1) ?> > Page précédente</a></div>
    	<?php } ?>
   

    
	    <?php if ($page < $nbrPages) { ?>
	        <div><a class="stylebutton" href= <?="index.php?action=showAllPostsAdmin&page=" .($page + 1)?> > Page suivante</a></div>
	    <?php } ?>


<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
