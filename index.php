<?php
    require_once('./Controler\PostControler.php');
    require_once('./Controler\CommentController.php');

    $postControler = new PostControler(); 
    $commentController = new CommentController(); 

    if (array_key_exists('action', $_GET)) {
        switch ($_GET['action']) {
            case 'post':
                if (array_key_exists('id', $_GET) && isset($_GET['id'])) {
                    $success = false;
                    if(array_key_exists('success', $_GET) && isset($_GET['success']) && $_GET['success'] == 1)
                    {
                        $success = true;
                    }
                    $postControler->getPost($_GET['id'], $success);

                }
        		break;

            case 'editComment':
                if (array_key_exists('id', $_GET) && isset($_GET['id'])) {
                    $commentController->editComment($_GET['id']);
                }
                break;

            case 'addComment':
                if (array_key_exists('id', $_GET) && isset($_GET['id'])) {
                   $commentController->addComment(
                            $_GET['id'],
                            $_POST['author'], 
                            $_POST['message']
                            );
                }
            break;

            case 'reportComment':
                if (array_key_exists('id', $_GET) && isset($_GET['id'])) {
                   $commentController->reportComment($_GET['id']);
                }
            break;

            case 'saveComment':
                if(array_key_exists('id', $_GET) && isset($_GET['id'])) {
                    $commentController->saveComment($_POST['author'],$_POST['comment'], $_GET['id']);
                }
                break;
            case 'showPage':
                if(array_key_exists('page', $_GET) && isset($_GET['page']))
                {
                  if(ctype_digit($_GET['page']))
                  {
                    $postControler->showPage(intval($_GET['page']));
                  }    
                }
                break;

        	default:
        		$postControler->getPosts();
        		break;
        }
    }   
    else {
        	$postControler->getPosts();
           
        }
    