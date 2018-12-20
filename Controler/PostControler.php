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
	    require ('./View/Frontend/HomeView.php');
	}
	public function getPost($postId, $success= false, $pageId)
	{
        $post = $this->postManager->getPost($postId);
        $comments = $this->commentManager->getCommentsByPost($postId, $pageId);
        $commentsCount = ceil($this->commentManager->getCommentsCountByPost($postId)/3);
        
		require ('./View/Frontend/PostView.php');
	}
	public function postComment($postId,$author,$comment)
	{
		$post = $this->postManager->postComment();
		require ('./View/Frontend/PostView.php');
	}

	public function editComment($postId,$author,$comment)
	{
		$post = $this->postManager->editComment();
		$post-> prepare('INSERT INTO comments($postId,$author,$comment) VALUES (::postId, ::author,::comment)');
		$post->execute(array());
		$newComment = $post->fetch(); 

		return $newcomment;
	}

	public function showPage($page)
	{
		$nbrPosts = $this->postManager->getPostsCount();
		$limit = 5;
		$nbrPages = ceil($nbrPosts/$limit);

		//$offset = ($page * $limit) - $limit;

		$offset = ($page > 0 && $page <= $nbrPages) ? ($page - 1) * $limit : 0;
		$posts = $this->postManager->getPostsByPage($limit, $offset);
	        require_once('./View/Frontend/HomeView.php');
	}
	//ADMIN
	public function getPostsAdmin()
	{
	    $postsAdmin = $this->postManager->getPostsAdmin();
	    require_once('./View/Backend/allposts.php');
	}
	/*public function goDashboard()
	{
	    $dashboard = $this->postManager->goDashboard();
	    require ('./View/Backend/dashboard.php');
	}*/
}