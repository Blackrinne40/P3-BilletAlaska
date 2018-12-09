<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Billet simple pour l'Alaska - par Jean Forteroche</title>
	<link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>

	<h1>Billet simple pour l'Alaska</h1>
	<a href="./index.php">Retour à la page d'accueil</a>

    <h3><strong><?=htmlspecialchars($post->getTitle())?></strong></h3>
    <p>Publié par <?=htmlspecialchars($post->getAuthor())?> le <?=htmlspecialchars($post->getCreation_date())?></p>

    
    <div>
        
        <p><?= $post->getContent() ?><br/></p>

    </div>
    <hr width="50%"/>
    <div>
        <h4>Ajouter un commentaire: </h4>
        <!-- Ajout de formulaire pour l'ajout de commentaire-->
        <form method="post" action=<?='index.php?action=addComment&id=' .$post->getId()?> >
            <label for='author'>Auteur </label><input type="text" name="author" id="author"/><br/>
            <label for='message'>Message </label><input type="text" name="message" id="message"/><br/>
            <button type='submit'>Envoyer</button>
        </form>
        <hr width="50%"/>
           <p>
            <?php foreach($comments as $comment) {?>
                <p>Commentaire: <a href=<?= "index.php?action=editComment&id=".$comment->getId() ?>>(modifier)</a>
                    <button type="submit"><a href=<?= "index.php?action=reportComment&id=".$comment->getId() ?>> Signaler ce commentaire</a></button><br/>
                    <i>Auteur : <?= $comment->getAuthor(); ?></i><br/>
                    <i>Message : <?= $comment->getComment(); ?></i><br/>
                    <hr width="40%"/>  
                </p>
            <?php } ?>
            </p> 

    </div>
	
</body>
</html>