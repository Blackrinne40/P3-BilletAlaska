<?php ob_start(); ?>

	<h2>Liste des commentaires</h2>
		
		<table class="allCommentsAdminTable">
			<thead>
			<tr><div>
					<td>Auteur</td>
					<td>Commentaire</td>
					<td>Date de publication du commentaire</td>
					<td>Action</td>
				</div></tr>
			</thead>
			<tbody>
		<?php foreach($comments as $comment) {?>
			<tr><div>
				<td><h3><strong><?=htmlspecialchars($comment->getAuthor())?></strong></h3></td>
				<td><p><?=htmlspecialchars($comment->getComment())?></p></td>
				<td><p><?=htmlspecialchars($comment->getComment_date())?></p></td>
				<td><a href=<?="index.php?action=deletecomment&id=".$comment->getId()?>> Supprimer le commentaire</a></td>
			</div></tr>
			</tbody>

			

		<?php } ?>
		</table>
		<?php if ($pageComment > 1) { ?>
        <div><a class="stylebutton" href= <?= "index.php?action=showAllCommentsAdmin&page=" .($pageComment - 1) ?> > Page précédente</a></div>
    	<?php } ?>
   

    
	    <?php if ($pageComment < $nbrPagesComments) { ?>
	        <div><a class="stylebutton" href= <?="index.php?action=showAllCommentsAdmin&page=" .($pageComment + 1)?> > Page suivante</a></div>
	    <?php } ?>

<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
