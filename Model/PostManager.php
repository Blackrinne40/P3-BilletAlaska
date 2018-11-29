<?php

require_once ('./Model/Database.php');
require_once ('./Model/PostClass.php');

class PostManager extends Database
{
    
    public function __construct(){
        parent::__construct();
    }

    public function getPosts()
    {
       $req = $this -> db->prepare('SELECT id, title, author, content, textresum, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
       $req -> execute();
       $posts = array();
       while ($dbPost = $req-> fetch()){
        $post = new PostClass($dbPost);
        $posts[] = $post;
       }
        return $posts;
    }

    public function getPost($postId)
    {
        $req = $this -> db->prepare('SELECT id, title, author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date FROM posts WHERE id = ?');
        $req->execute(array($postId));
       
        $dbPost = $req->fetch();
        $post = new PostClass($dbPost);

        return $post;
    }

    public function getComments($postId)
    {
        $comments = $this -> db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId,$author,$comment)
    {
        $newComment = $this -> db -> prepare('INSERT INTO commentaires (post_id, author, comment, comment_date) VALUES (:post_id, :author, :comment, NOW()');
        $affectedLines = $newComment -> execute(array($postId, $author, $comment));
        return $affectedLines;
    }
/*Ajout fonction pour résumer le texte
    public function texte_resume_brut( $textresum, $nbreCar, $postId, $title, $content)
    {

        $req->prepare('SELECT id, title, content FROM posts WHERE id = ?');
        
        $req->execute(array(
            ':postId' => $postId,
            ':title' => $title,
            ':content' => $content
        ));
       
        $dbPost = $req->fetch();
        $textresum = new PostModel($dbPost);


        $textresum = trim(strip_tags($textresum)); // suppression des balises HTML
        if( is_numeric($nbreCar) )
        {
            $PointSuspension = '...'; // points de suspension (ou '' si vous n'en voulez pas)
            // ---------------------
            // COUPE DU TEXTE pour le RÉSUMÉ
            // ajout d'un espace de fin au cas où le texte n'en contiendrait pas...
            $textresum.= ' ';
            $LongueurAvant = mb_strlen($textresum);
            if( $LongueurAvant > $nbreCar ){
                // pour ne pas couper un mot, on va à l'espace suivant
                $textresum = mb_substr($textresum, 0, strpos($texte, '...', $nbreCar));
                // On ajoute (ou pas) des points de suspension à la fin si le texte brut est plus long que $nbreCar
                if( !empty($PointSuspension) ){
                    $textresum .= $PointSuspension;
                }
            }
            // ---------------------
        }
        // On renvoie le résumé du texte correctement formaté.
        return $textresum;
    }
    */
}