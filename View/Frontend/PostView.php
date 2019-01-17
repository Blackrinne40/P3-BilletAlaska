<?php ob_start(); ?>
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
        <form method="post" action=<?="index.php?action=addComment&id=" .$post->getId()?> >
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
           <p class="comment">
            <?php foreach($comments as $comment) {?>
                <table class="container table table-bordered">
                        <tbody>
                            <tr class="table">
                                <td class="commenttitle">Commentaire :</td>
                                <td>
                                    <a class="nodecorationlink btn btn-info" href=<?= "index.php?action=editComment&id=".$comment->getId() ?>>
                                    <span class="fas fa-edit"></span>
                                    <span class="infobulle">(modifier)</span>
                                    </a>
                                    <a class="nodecorationlink btn btn-info" href=<?= "index.php?action=reportComment&id=".$comment->getId() ?>> 
                                    <span class="fas fa-exclamation-circle"></span>
                                    <span class="infobulle">Signaler ce commentaire</span>
                                    </a>
                                </td>
                            </tr>        
                            <tr>
                                <td>Signalements </td>
                                <td><span class="badge badge-primary badge-pill"><?php echo($comment-> getReports())?></span> </td>
                            </tr>
                            <tr>
                                <td>Auteur</td>
                                <td><?= htmlspecialchars_decode($comment->getAuthor()) ?></td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td><?= htmlspecialchars_decode($comment->getComment()) ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <!--<span>Signalements :</span> <span class="badge badge-primary badge-pill"><?php echo($comment-> getReports())?></span><br/>
                    
                    <span>Auteur : </span><span><?= htmlspecialchars_decode($comment->getAuthor()) ?></span><br/>
                    <span>Message : </span><span><?= htmlspecialchars_decode($comment->getComment()) ?></span>
                    -->
                    <hr width="40%"/>  

            
            <?php } ?>
            </p>

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
