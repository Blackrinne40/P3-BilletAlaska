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

    public function getPostsCount()
    {
        $req = $this->db->prepare('SELECT COUNT(id) AS count FROM posts');
        $req->execute(array());
        $postCount = $req->fetch();
        return $postCount['count']; 
    }

    public function getPostsByPage($limit, $offset)
    {
        $req = $this->db->prepare('SELECT id, title, author, content, textresum, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY id DESC LIMIT ' .$limit.' OFFSET ' .$offset);
        $req->execute(array());
        $posts = array();
       while ($dbPost = $req-> fetch()){
        $post = new PostClass($dbPost);
        $posts[] = $post;
       }
        return $posts;
    }
}