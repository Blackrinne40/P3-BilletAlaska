<?php ob_start(); ?>
<!DOCTYPE html>
<html>
	<div class="container">
		<img src="Public\Images\homeviewalaska.jpg" alt="homeviewalaska" title="homeviewalaska" class="img-fluid" />
	</div>

	<div class="container">
		<h2>Derniers Chapitres</h2>
	</div>
	
	
	<div class="section">
		<div class="container">
			<?php foreach($posts as $post) {?>
				<div>
					<h3><strong><?=htmlspecialchars($post->getTitle())?></strong></h3>
					<p class="text-center">Publié par 
						<span style="color: Tomato;">
							<i class=" fas fa-pen-square"></i> 
						</span><?=htmlspecialchars($post->getAuthor())?>
					</p>
					<p class="text-center"><?= $post->getTextResum() ?></p>
					<a  class=" read-more stylebutton page-link" href=<?= "index.php?action=post&id=". $post->getId(). "&page=0" ?>> Lire la suite </a>
				</div>
				<hr>
			<?php } ?>
		</div>
		<nav aria-label="Navigation Home View">
		  	<div class="pagination">
				<?php if ($page > 1) { ?>
		        <div class="page-item"><a class="stylebutton page-link" href= <?= "index.php?action=showPage&page=" .($page - 1) ?>>Précédent</a></div>
		    	<?php } ?>
		   

		    
			    <?php if ($page < $nbrPages) { ?>
			     <div class="page-item"><a class="stylebutton page-link" href= <?="index.php?action=showPage&page=" .($page + 1)?>>Suivant</a></div>
			    <?php } ?>
			</div>
		</nav>
		<br/>

<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
