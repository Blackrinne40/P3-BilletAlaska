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

		require('./View/Frontend/editComment.php');
    }
    public function saveComment($author,$comment, $commentId)
	{
		$comment = $this->commentManager->saveComment($author,$comment, $commentId);
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
    public function showPageComments($pageComment)
    {
        $nbrComments = $this->commentManager->getCommentsCount();
        $limit = 3;
        $nbrPagesComments = ceil($nbrComments/$limit);

        //$offset = ($page * $limit) - $limit;

        $offset = ($pageComment > 0 && $pageComment <= $nbrPagesComments) ? ($pageComment - 1) * $limit : 0;
        $comments = $this->commentManager->getCommentsByPage($limit, $offset);
            require_once('./View/Frontend/PostView.php');
    }
    //ADMIN
    public function getCommentsAdmin($pageComment)
    {
       $nbrComments = $this->commentManager->getCommentsCount();
        $limit = 5;
        $nbrPagesComments = ceil($nbrComments/$limit);

        //$offset = ($page * $limit) - $limit;

        $offset = ($pageComment > 0 && $pageComment <= $nbrPagesComments) ? ($pageComment - 1) * $limit : 0;
       $comments = $this->commentManager->getCommentsByPage($limit, $offset); 

       require_once('./View/Backend/allcomments.php');
    }
    public function getReportsComments($pageReport)
    {
        $nbrComments = $this->commentManager->getCommentsCount();
        $limit = 5;
        $nbrPagesComments = ceil($nbrComments/$limit);

        //$offset = ($page * $limit) - $limit;

        $offset = ($pageReport > 0 && $pageReport <= $nbrPagesComments) ? ($pageReport - 1) * $limit : 0;
        $reportComments = $this->commentManager->getReportsByPage($limit, $offset); 
        require_once('./View/Backend/reportcomments.php');
    }
}