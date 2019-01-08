<?php ob_start(); ?>

	<h2>Liste des articles</h2>

		<table class=" container table table-bordered">
			<thead class="table">
			<tr class="table text-center">
					<td>Articles</td>
					<td>Actions</td>

			</tr>
			</thead>
			<tbody class="table">
		<?php foreach($postsAdmin as $post) {?>
			<tr class="table">
				<td><strong><?=htmlspecialchars($post->getTitle())?></strong></td>
				<td>
					<a href=<?= "index.php?action=post&id=". $post->getId(). "&page=0" ?>> 
						<i class="fas fa-book-open fa-2x"></i>
						<span class="infobulle">Consulter le billet</span>
					</a>
					<a href=<?="index.php?action=editpost&id=".$post->getId()?>>
						<i class="fas fa-edit fa-2x"></i>
						<span class="infobulle">Modifier le billet</span>
					</a>
					<a href=<?="index.php?action=deletepost&id=".$post->getId()?>>
						<i class="fas fa-trash-alt fa-2x"></i>
						<span class="infobulle">Supprimer le billet</span>
					</a>
				</td>
			</tr>
			</tbody>
		<?php } ?>

			</table>
			<br/>

		<nav aria-label="Navigation Home View">
            <div class="pagination">
				<?php if ($page > 1) { ?>
		        <div class="page-item"><a class="stylebutton page-link" href= <?= "index.php?action=showAllPostsAdmin&page=" .($page - 1) ?> > Page précédente</a></div>
		    	<?php } ?>
		   

		    
			    <?php if ($page < $nbrPages) { ?>
			        <div class="page-item"><a class="stylebutton page-link" href= <?="index.php?action=showAllPostsAdmin&page=" .($page + 1)?> > Page suivante</a></div>
			    <?php } ?>
	    	</div>
        </nav> <br/>


<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
