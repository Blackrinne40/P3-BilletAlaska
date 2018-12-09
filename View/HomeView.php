<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Billet simple pour l'Alaska - par Jean Forteroche</title>
	<link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>

	<h1><a class="blogTitle" href="index.php?action=showPage&page=1">Billet simple pour l'Alaska</a></h1>

	<h2>Derniers Chapitres</h2>
		<?php foreach($posts as $post) {?>
			<div>
				<h3><strong><?=htmlspecialchars($post->getTitle())?></strong></h3>
				<p><?= $post->getTextResum() ?></p>
				<a href=<?= "index.php?action=post&id=". $post->getId() ?>> Lire la suite </a>
			</div>
		<?php } ?>
	 
		<?php if ($page > 1) { ?>
        <div><a class="stylebutton" href= <?= "index.php?action=showPage&page=" .($page - 1) ?> > Page précédente</a></div>
    	<?php } ?>
   

    
	    <?php if ($page < $nbrPages) { ?>
	        <div><a class="stylebutton" href= <?="index.php?action=showPage&page=" .($page + 1)?> > Page suivante</a></div>
	    <?php } ?>
 	
</body>
</html>