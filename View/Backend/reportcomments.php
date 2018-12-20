<?php ob_start(); ?>

	<h2>Commentaires signalés</h2>
		<?php foreach($comments as $comment) {?>
			<div>
				<h3><strong><?=htmlspecialchars($comment->getAuthor())?></strong></h3>
				<p><?=htmlspecialchars($comment->getComment())?></p>
				<p><?=htmlspecialchars($comment->getCommentDate())?></p>
				<p><?=htmlspecialchars(($comment->getReports()))?></p>
			</div>
		<?php } ?>


<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
