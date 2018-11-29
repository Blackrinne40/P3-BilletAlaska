<?php  

require_once('./Model/PostManager.php');
require_once('./Model/CommentManager.php');

class PostControler
{
    private $postManager;
    private $commentManager;
	
	public function __construct()
	{
		$this->postManager = new PostManager();
		$this->commentManager = new CommentManager();
	}

	public function getPosts()
	{
	    $posts = $this->postManager->getPosts();
	    require ('./View/HomeView.php');
	}
	public function getPost($postId, $success= false)
	{
        $post = $this->postManager->getPost($postId);
        $comments = $this->commentManager->getCommentsByPost($postId);
		require ('./View/PostView.php');
	}
	public function postComment($postId,$author,$comment)
	{
		$post = $this->postManager->postComment();
		require ('./View/PostView.php');
	}

	public function editComment($postId,$author,$comment)
	{
		$post = $this->postManager->editComment();
		$post-> prepare('INSERT INTO comments($postId,$author,$comment) VALUES (::postId, ::author,::comment)');
		$post->execute(array());
		$newComment = $post->fetch(); 

		return $newcomment;
	}
	/*public function texte_resume_brut($textresum, $nbreCar, $postId, $title, $content)
	{
		$textresum = $this->postManager->texte_resume_brut();
		return $textresum;
	}*/
}