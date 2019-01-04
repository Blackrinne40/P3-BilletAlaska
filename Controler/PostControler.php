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
	public function getPostsAdmin($page)
	{
	    $nbrPosts = $this->postManager->getPostsCount();
		$limit = 5;
		$nbrPages = ceil($nbrPosts/$limit);

		//$offset = ($page * $limit) - $limit;

		$offset = ($page > 0 && $page <= $nbrPages) ? ($page - 1) * $limit : 0;
	    $postsAdmin = $this->postManager->getPostsAdmin($limit, $offset);
	    require_once('./View/Backend/allposts.php');
	}
	public function goDashboard()
	{
	    require('./View/Backend/dashboard.php');
	}
	public function deletePost($postId)
    {
        $this->postManager->deletePost($postId);
        header('Location: index.php?action=showAllPostsAdmin&page=1');
    }
	public function editPost($postId)
    {
        $post = $this->postManager->getPost($postId);
        require('./View/Backend/editpost.php');
    }
    public function savePost($postId,$author,$title,$content,$textresum)
	{

		$this->postManager->savePost($postId,$author,$title,$content,$textresum);
		$post = $this->postManager->getPost($postId);

		header('Location: index.php?action=showAllPostsAdmin&page=1');

    }
    public function addPost($author,$title,$content,$textresum)
    {
    	$this->postManager->addPost($author,$title,$content,$textresum);
    	header('Location: index.php?action=showAllPostsAdmin&page=1');
    }

    public function goCreationPost()
    {
    	require('./View/Backend/addpost.php');
    }
}