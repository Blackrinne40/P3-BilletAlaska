<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Billet simple pour l'Alaska - par Jean Forteroche</title>
	<link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>

	<h1>Billet simple pour l'Alaska</h1>

	<h2>Derniers Chapitres</h2>
		<?php foreach($posts as $post) {?>
			<div>
				<h3><strong><?=htmlspecialchars($post->getTitle())?></strong></h3>
				<p><?= $post->getTextResum() ?></p>
				<a href=<?= "index.php?action=post&id=". $post->getId() ?>> Lire la suite </a>
			</div>
		<?php } ?>
</body>
</html>