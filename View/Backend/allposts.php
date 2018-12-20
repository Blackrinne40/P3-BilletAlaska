<?php ob_start(); ?>

	<h2>Liste des articles</h2>
		<?php foreach($postsAdmin as $post) {?>

			<div>
				<h3><strong><?=htmlspecialchars($post->getTitle())?></strong></h3>
				<a href=<?= "index.php?action=post&id=". $post->getId(). "&page=0" ?>> Lire la suite </a>
			</div>
		<?php } ?>


<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
