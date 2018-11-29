<?php

require_once ('./Model/Model.php'); 

class CommentClass extends Model {

	private $id;
	private $post_id;
	private $author;
    private $comment; 
    private $comment_date;
    private $reports;

	public function __construct($donnees){
		$this-> hydrate($donnees);
	}

	public function getId(){
		return $this->id;
	}

	public function getPost_id(){
		return $this->post_id;
	}

	public function getAuthor(){
		return $this->author;
	}
	public function getComment(){
		return $this->comment;
    }
	public function getComment_date(){
		return $this->comment_date;
	}

	public function getReports(){
		return $this->reports;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function setPost_id($postId){
		$this->post_id = $postId;
	}
	public function setAuthor($author){
		$this->author = $author;
	}
	public function setComment($comment){
		$this->comment = $comment;
    }
	public function setComment_date($commentDate){
		$this->comment_date = $commentDate;
	}
	public function setReports($reports)
    {
        $reports = (int) $reports;

        if ($reports >= 0)
        {
            $this->reports = $reports;
        }
    }
}