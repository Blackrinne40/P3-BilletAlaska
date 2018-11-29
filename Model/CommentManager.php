<?php

require_once ('./Model/Database.php');
require_once ('./Model/CommentClass.php');

class CommentManager extends Database 
{
    
    public function __construct(){
        parent::__construct();
    }

    public function getCommentsByPost($postId)
    {
       $req = $this -> db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comments WHERE post_id = :postId ORDER BY comment_date DESC LIMIT 0, 5');
       $req->execute(array(':postId' => $postId));
       $comments=array();
       while ($dbComment = $req->fetch()){
        $comment=new CommentClass($dbComment);
        $comments[] = $comment;
       }
        return $comments;
    }

    public function getComment($commentId) {
        $req = $this->db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comments WHERE id = :commentId');
        $req->execute(array('commentId' => $commentId));
        $dbComment = $req->fetch();
        $comment = new CommentClass($dbComment);

        return $comment;
    }

    public function saveComment($author,$comment, $reports, $commentId) {
        $req = $this->db->prepare('UPDATE comments SET author = :author, comment = :comment, reports = :reports WHERE id = :commentId');
        $req->execute(array(
          ':commentId' => $commentId,
          ':author' => $author,
          ':comment' => $comment,
          ':reports' => $reports
        )); 
    }
    public function addComment($post_id, $author, $comment)
    {
      $req = $this->db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (:post_id, :author, :comment, NOW())');
      $req->execute(array(
        ':post_id' => $post_id,
        ':author' => $author,
        ':comment' => $comment
      ));
      $req->fetch();
      $newcomment = new CommentClass($req);
      return $newcomment;
    }

    public function reportComment($commentId)
    {
      $req = $this->db->prepare('UPDATE comments SET reports=reports+1 WHERE id= :id');
      $req->execute(array(
        ':id' => $commentId));
      return true;
    }

    /*function reportComment($commentId)
    {
        $reportcomment = $this->getComment($commentId);

        $reportcomment = $this->setReports(1);

        $reportcomment = $this->saveComment($comment);
        $reportcomment = new CommentClass();
        return $reportcomment;

    }*/

}