<?php ob_start(); ?>

	<h2>Liste des commentaires</h2>
		
		<table class=" container table table-bordered">
			<thead class="table">
			<tr class="table text-center">
					<td>Auteur</td>
					<td>Commentaire</td>
					<td>Date de publication du commentaire</td>
					<td>Action</td>
			</tr>
			</thead>
			<tbody class="table">
		<?php foreach($comments as $comment) {?>
			<tr class="table text-center">
				<td><strong><?=htmlspecialchars($comment->getAuthor())?></strong></td>
				<td><p><?=htmlspecialchars_decode($comment->getComment())?></p></td>
				<td><p><?=htmlspecialchars($comment->getComment_date())?></p></td>
				<td>
					<a href=<?="index.php?action=deletecomment&id=".$comment->getId()?>> 
						<i class="fas fa-trash-alt fa-2x"></i>
						<span class="infobulle">Supprimer le commentaire</span>
						</a>
				</td>
			</tr>
			</tbody>

		<?php } ?>
		</table>

		<nav aria-label="Navigation Home View">
            <div class="pagination">
				<?php if ($pageComment > 1) { ?>
		        	<div class="page-item"><a class="stylebutton page-link" href= <?= "index.php?action=showAllCommentsAdmin&page=" .($pageComment - 1) ?> > Page précédente</a></div>
		    	<?php } ?>
		   

		    
			    <?php if ($pageComment < $nbrPagesComments) { ?>
			        <div class="page-item"><a class="stylebutton page-link" href= <?="index.php?action=showAllCommentsAdmin&page=" .($pageComment + 1)?> > Page suivante</a></div>
			    <?php } ?>
			</div>
        </nav> <br/>

<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
