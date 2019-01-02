<?php ob_start(); ?>

	<h2>Liste des articles</h2>

		<table class="allPostsAdminTable">
			<tr><div>
					<td>Articles</td>
					<td colspan="3" width="50%">Actions</td>

				</div></tr>

		<?php foreach($postsAdmin as $post) {?>
			<table class="allPostsAdminTable">
			<tr><div>
				<td><h3><strong><?=htmlspecialchars($post->getTitle())?></strong></h3></td>
				<td><a href=<?= "index.php?action=post&id=". $post->getId(). "&page=0" ?>> Consulter le billet</a></td>
				<td><a href=<?="index.php?action=editpost&id=".$post->getId()?>>Modifier le billet</a></td>
				<td><a href=<?="index.php?action=deletepost&id=".$post->getId()?>>Supprimer le billet</a></td>
			</div></tr>
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
