<?php ob_start(); ?>
<!DOCTYPE html>
<html>


	<a href="./index.php?action=showPage&page=1">Retour à la page d'accueil</a>

    <h3><strong><?=htmlspecialchars($post->getTitle($postId))?></strong></h3>
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
            <?php if ($pageId > 0) { ?>
            <div><a class="stylebutton" href= <?= "index.php?action=post&id=".$post->getId()."&page=" .($pageId - 1) ?> > Page précédente</a></div>
            <?php } ?>
       

            <?php if ($pageId < $commentsCount -1) { ?>
                <div><a class="stylebutton" href= <?="index.php?action=post&id=".$post->getId()."&page=" .($pageId + 1)?> > Page suivante</a></div>
            <?php } ?>
            </p> 

    </div>
<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
