<?php ob_start(); ?>
<!DOCTYPE html>
<html>

	<h2>Derniers Chapitres</h2>
	<a href="./View/Backend/dashboard.php"> Tableau de bord</a>
		<?php foreach($posts as $post) {?>
			<div>
				<h3><strong><?=htmlspecialchars($post->getTitle())?></strong></h3>
				<p><?= $post->getTextResum() ?></p>
				<a href=<?= "index.php?action=post&id=". $post->getId(). "&page=0" ?>> Lire la suite </a>
			</div>
		<?php } ?>
	 
		<?php if ($page > 1) { ?>
        <div><a class="stylebutton" href= <?= "index.php?action=showPage&page=" .($page - 1) ?> > Page précédente</a></div>
    	<?php } ?>
   

    
	    <?php if ($page < $nbrPages) { ?>
	        <div><a class="stylebutton" href= <?="index.php?action=showPage&page=" .($page + 1)?> > Page suivante</a></div>
	    <?php } ?>

<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
