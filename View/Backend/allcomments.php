<?php ob_start(); ?>

	<h2>Liste des commentaires</h2>
		<?php foreach($comments as $comment) {?>
			<div>
				<h3><strong><?=htmlspecialchars($comment->getAuthor())?></strong></h3>
				<p><?=htmlspecialchars($comment->getComment())?></p>
				<p><?=htmlspecialchars($comment->getComment_date())?></p>
			</div>
		<?php } ?>
		<?php if ($pageComment > 1) { ?>
        <div><a class="stylebutton" href= <?= "index.php?action=showAllCommentsAdmin&page=" .($pageComment - 1) ?> > Page précédente</a></div>
    	<?php } ?>
   

    
	    <?php if ($pageComment < $nbrPagesComments) { ?>
	        <div><a class="stylebutton" href= <?="index.php?action=showAllCommentsAdmin&page=" .($pageComment + 1)?> > Page suivante</a></div>
	    <?php } ?>

<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
