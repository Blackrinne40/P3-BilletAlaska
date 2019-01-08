<?php ob_start(); ?>

	<h2>Commentaires signalés</h2>
	
		<table class=" container table table-bordered">
			<thead class="table">
				<tr class="table text-center">
					<td>Auteur</td>
					<td>Commentaire</td>
					<td>Date de publication du commentaire</td>
					<td>Signalements</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody class="table">
		<?php foreach($reportsComments as $reportComment) {?>
			
				<tr class="table text-center">
					<td><strong><?=htmlspecialchars($reportComment->getAuthor())?></strong></td>
					<td><p><?=htmlspecialchars($reportComment->getComment())?></p></td>
					<td><p><?=htmlspecialchars($reportComment->getComment_date())?></p></td>
					<td><p><?=htmlspecialchars(($reportComment->getReports()))?></p></td>
					<td><a href=<?="index.php?action=approvecomment&id=".$reportComment->getId()?>>
							<i class="fas fa-check-square fa-2x"></i>
							<span class="infobulle"> Approuver le commentaire</span>
						</a>
						<a href=<?="index.php?action=deletecomment&id=".$reportComment->getId()?>>
							<i class="fas fa-trash-alt fa-2x"></i>
							<span class="infobulle"> Supprimer le commentaire</span>
						</a>
					</td>
				</tr>
			</tbody>
			
		<?php } ?>
		</table>

		<nav aria-label="Navigation Home View">
            <div class="pagination">
				<?php if ($pageReport > 1) { ?>
		        	<div class="page-item"><a class="stylebutton page-link" href= <?= "index.php?action=showAllReportsComments&page=" .($pageReport - 1) ?> > Page précédente</a></div>
		    	<?php } ?>
		   

		    
			    <?php if ($pageReport < $nbrPagesComments) { ?>
			        <div class="page-item"><a class="stylebutton page-link" href= <?="index.php?action=showAllReportsComments&page=" .($pageReport + 1)?> > Page suivante</a></div>
			    <?php } ?>
			</div>
        </nav> <br/>


<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
