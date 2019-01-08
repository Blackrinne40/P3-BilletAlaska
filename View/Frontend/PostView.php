<?php ob_start(); ?>
<!DOCTYPE html>
<html>


	<a class="link-post" href="./index.php?action=showPage&page=1"><i class="fas fa-chevron-left"></i> Retour à la page d'accueil</a>
    <br/>
    <div class="container">
    <h3><strong><?=htmlspecialchars($post->getTitle($postId))?></strong></h3>
    <p class="text-center">Publié par 
        <span style="color: Tomato;">
            <i class=" fas fa-pen-square"></i> 
        </span><?=htmlspecialchars($post->getAuthor())?> 
        le <span style="color: royalblue;"><i class="fas fa-calendar-day"></i></span> <?=htmlspecialchars($post->getCreation_date())?></p>
    </div>
    
    <div class="container text-justify">
        
        <div class="postcontent "><?= htmlspecialchars_decode($post->getContent()) ?></div>

    </div>
    <hr width="50%"/>
    <div>
       <div class="container">
        <h4>Ajouter un commentaire: </h4>
        <!-- Ajout de formulaire pour l'ajout de commentaire-->
        <form method="post" action=<?='index.php?action=addComment&id=' .$post->getId()?> >
            <div class="form-group">
                <label for='author'>Auteur </label>
                <input type="text" name="author" id="author" class="form-control" /><br/>
            </div>
            <div class="form-group">
                <label for='message'>Message </label>
                <textarea name="message" id="message" class="form-control"></textarea><br/>
            </div>
            <button class="btn btn-primary" type='submit'>Envoyer</button>
        </form>
        <hr width="50%"/>
        </div>
        <div class="container">
           <p>
            <?php foreach($comments as $comment) {?>
                <p class="comment">
                    <span class="commenttitle">Commentaire:</span> 
                    <button type="submit" class="btn btn-info">
                        <a class="nodecorationlink" href=<?= "index.php?action=editComment&id=".$comment->getId() ?>>
                            <i class="fas fa-edit"></i>
                            <span class="infobulle">(modifier)</span>
                        </a>
                    </button>
                    <button type="submit" class="btn btn-info">
                        <a class="nodecorationlink " href=<?= "index.php?action=reportComment&id=".$comment->getId() ?>> 
                            <i class="fas fa-exclamation-circle"></i>
                            <span class="infobulle">Signaler ce commentaire</span>
                        </a>
                    </button>
                    <br/>
                    Signalements : <span class="badge badge-primary badge-pill"><?php echo($comment-> getReports())?></span><br/>
                    
                    <i>Auteur : <?= $comment->getAuthor(); ?></i><br/>
                    <i >Message : <?= $comment->getComment(); ?></i><br/>
                    <hr width="40%"/>  

                </p>
            <?php } ?>


            <nav aria-label="Navigation Home View">
                <div class="pagination">
                    <?php if ($pageId > 0) { ?>
                        <div class="page-item"><a class="stylebutton page-link" href= <?= "index.php?action=post&id=".$post->getId()."&page=" .($pageId - 1) ?> > Page précédente</a>
                        </div>
                    <?php } ?>
           

                    <?php if ($pageId < $commentsCount -1) { ?>
                        <div class="page-item"><a class="stylebutton page-link" href= <?="index.php?action=post&id=".$post->getId()."&page=" .($pageId + 1)?> > Page suivante</a>
                        </div>
                    <?php } ?>
            
                </div>
            </nav>
        </div>
<?php $content = ob_get_clean();   
require_once('template/body.php'); ?>
