<?php  

require_once('./Model/PostManager.php');
require_once('./Model/CommentManager.php');

class CommentController
{
    private $postManager;
    private $commentManager;
	
	public function __construct()
	{
		$this ->postManager = new PostManager();
		$this ->commentManager = new CommentManager();
	}

	public function editComment($commentId)
	{
		$comment = $this->commentManager->getComment($commentId);

		require('./View/editComment.php');
    }
    public function saveComment($author, $comment, $commentId)
	{
		$this->commentManager->saveComment($author, $comment, $commentId);
		$comment = $this->commentManager->getComment($commentId);

		header('Location: index.php?action=post&id='. $comment->getPost_id());

    }
    public function addComment($post_id, $author, $comment)
    {
    	$this->commentManager->addComment($post_id, $author, $comment);
    	header('Location: index.php?action=post&id='. $post_id);
    }
    
    public function reportComment($commentId)
    {
    	$success = $this->commentManager->reportComment($commentId);
    	$comment = $this->commentManager->getComment($commentId);
    	header('Location: index.php?action=post&id='. $comment->getPost_Id().'&success='.$success);
    }
}