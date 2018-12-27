<?php ob_start(); ?>

	<h2>Commentaires signalés</h2>
	
		<?php foreach($reportComments as $reportComment) {?>
			<div>
				<h3><strong><?=htmlspecialchars($reportComment->getAuthor())?></strong></h3>
				<p><?=htmlspecialchars($reportComment->getComment())?></p>
				<p><?=htmlspecialchars($reportComment->getComment_date())?></p>
				<p><?=htmlspecialchars(($reportComment->getReports()))?></p>
			</div>
		<?php } ?>
		<?php if ($pageReport > 1) { ?>
        <div><a class="stylebutton" href= <?= "index.php?action=showAllReportsComments&page=" .($pageReport - 1) ?> > Page précédente</a></div>
    	<?php } ?>
   

    
	    <?php if ($pageReport < $nbrPagesComments) { ?>
	        <div><a class="stylebutton" href= <?="index.php?action=showAllReportsComments&page=" .($pageReport + 1)?> > Page suivante</a></div>
	    <?php } ?>


<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
