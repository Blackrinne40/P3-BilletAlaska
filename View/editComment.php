<!DOCTYPE html>
<html>
<head>
	<title>Modifier mon commentaire</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href=".../styles.css">
</head>
<body>
	
	<form method="post" action=<?="./index.php?action=saveComment&id=".$comment->getId() ?>>
		<label for="author">Author  </label>
        <input type="text" name="author" id="author" value=<?= $comment->getAuthor() ?> />
        
        <br/>

		<label for="comment">Commentaire</label>
        <textarea row='50' col='20' name="comment" id="comment"><?= $comment->getComment() ?></textarea>
        
        <br/>

		<button type="submit">Envoyer</button>
	</form>

</body>
</html>