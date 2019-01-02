<?php

require_once ('./Model/Database.php');
require_once ('./Model/CommentClass.php');

class CommentManager extends Database 
{
    
    public function __construct(){
        parent::__construct();
    }

    public function getCommentsByPost($postId, $pageId)
    {
       $req = $this -> db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comments WHERE post_id = :postId ORDER BY comment_date DESC LIMIT 3 OFFSET ' .$pageId*3);
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

    public function saveComment($author,$comment, $commentId)
    {
        $req = $this->db->prepare('UPDATE comments SET author = :author, comment = :comment WHERE id = :commentId');
        $req->execute(array(
          ':commentId' => $commentId,
          ':author' => $author,
          ':comment' => $comment
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

    }

    public function reportComment($commentId)
    {
      $req = $this->db->prepare('UPDATE comments SET reports=reports+1 WHERE id= :id');
      $req->execute(array(
        ':id' => $commentId));
      return true;
    }

    public function getCommentsCount()
    {
        $req = $this->db->prepare('SELECT COUNT(id) AS count FROM comments');
        $req->execute(array());
        $dbComment = $req->fetch();

        return $dbComment['count']; 
    }

     public function getCommentsCountByPost($postId)
    {
        $req = $this->db->prepare('SELECT COUNT(id) AS count FROM comments WHERE post_id = ?');
        $req->execute(array($postId));
        $commentCount = $req->fetch();

        return $commentCount['count']; 
    }

    public function getCommentsByPage($limit, $offset)
    {
        $req = $this->db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comments ORDER BY post_id DESC LIMIT ' .$limit.' OFFSET ' .$offset);
        $req->execute(array());
        $comments = array();
       while ($dbComment = $req-> fetch()){
        $comment = new CommentClass($dbComment);
        $comments[] = $comment;
       }
        return $comments;
    }
     public function getReportsByPage($limit, $offset)
    {

        $req = $this->db->prepare('SELECT id, post_id, author, comment,reports, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comments WHERE reports>0 ORDER BY post_id DESC LIMIT :limitadmin OFFSET :offsetadmin');
        $req->bindParam(':limitadmin', $limit, PDO::PARAM_INT);
        $req->bindParam(':offsetadmin', $offset, PDO::PARAM_INT);
        $req->execute();
        $reportsComments = array();
       while ($dbComment = $req-> fetch()){
        $reportComment = new CommentClass($dbComment);
        $reportsComments[] = $reportComment;
       }
        return $reportsComments;
    }

    public function deleteComment ($commentId)
    {
      $req = $this->db->prepare('DELETE FROM comments WHERE id=:id');
      $req->execute(array(
        'id' => $commentId
      ));
    }
    public function getReportsCommentsCount()
    {
        $req = $this->db->prepare('SELECT COUNT(id) AS count  WHERE reports>0 FROM comments');
        $req->execute(array());
        $dbComment = $req->fetch();

        return $dbComment['count']; 
    }
    public function approveComment($reports, $commentId) {
        $req = $this->db->prepare('UPDATE comments SET reports = 0 WHERE id = comment_id');
        $req->execute(array(
          'comment_id' => $commentId,
          'reports' => $reports
        )); 
        var_dump($reports);
    }
    

}