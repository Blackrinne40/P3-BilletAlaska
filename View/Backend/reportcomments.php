<?php ob_start(); ?>

	<h2>Commentaires signalés</h2>
	
		<table class="allReportsAdminTable">
				<tr><div>
					<td>Auteur</td>
					<td>Commentaire</td>
					<td>Date de publication du commentaire</td>
					<td>Signalements</td>
					<td colspan="2">Actions</td>
				</div></tr>
		<?php foreach($reportsComments as $reportComment) {?>
			
			<table class="allReportsAdminTable">
				<tr><div>
					<td><h3><strong><?=htmlspecialchars($reportComment->getAuthor())?></strong></h3></td>
					<td><p><?=htmlspecialchars($reportComment->getComment())?></p></td>
					<td><p><?=htmlspecialchars($reportComment->getComment_date())?></p></td>
					<td><p><?=htmlspecialchars(($reportComment->getReports()))?></p></td>
					<td><a href=<?="index.php?action=approvecomment&id=".$reportComment->getId()?>> Approuver le commentaire</td>
					<td><a href=<?="index.php?action=deletecomment&id=".$reportComment->getId()?>> Supprimer le commentaire</td>
				</div></tr>
			</table>


		<?php } ?>
		<?php if ($pageReport > 1) { ?>
        <div><a class="stylebutton" href= <?= "index.php?action=showAllReportsComments&page=" .($pageReport - 1) ?> > Page précédente</a></div>
    	<?php } ?>
   

    
	    <?php if ($pageReport < $nbrPagesComments) { ?>
	        <div><a class="stylebutton" href= <?="index.php?action=showAllReportsComments&page=" .($pageReport + 1)?> > Page suivante</a></div>
	    <?php } ?>


<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
