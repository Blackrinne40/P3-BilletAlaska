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
                    if(array_key_exists('page', $_GET) && isset($_GET['page']))
                        {
                          if(ctype_digit($_GET['page']))
                          {
                            $postControler->getPost($_GET['id'], $success,intval($_GET['page']));
                          } 
                          else
                          {
                            header('Location: index.php?action=post&id=' .$_GET['id']. '&page=0');
                          } 
                        }
                    
                    else
                      {
                        header('Location: index.php?action=post&id=' .$_GET['id']. '&page=0');
                      }
                }
                else
                  {
                    header ('Location: index.php?action=showPage&page=1');
                  } 
        		break;

            case 'editComment':
                if (array_key_exists('id', $_GET) && isset($_GET['id'])) {
                    $commentController->editComment($_GET['id']);
                }
                else
                      {
                        header('Location: index.php?action=post&id=' .$_GET['id']. '&page=0');
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
                else
                      {
                        header('Location: index.php?action=post&id=' .$_GET['id']. '&page=0');
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
                  else
                  {
                    header ('Location: index.php?action=showPage&page=1');
                  } 
                }
                else
                  {
                    header ('Location: index.php?action=showPage&page=1');
                  } 
                break;

            //ADMIN
            case 'dashboard':
              
                $postControler->goDashboard();

              /*else
              {
                 header ('Location: index.php?action=showPage&page=1');
              }*/
              break;

            case 'showAllPostsAdmin':
              if(isset($_GET['page']))
              {
                if(ctype_digit($_GET['page']))
                  {
                $postControler->getPostsAdmin(intval($_GET['page']));
                  }
              }
              else
              {
                header ('Location: index.php?action=dashboard');
              }
              break;

            case 'showAllCommentsAdmin': 
              if(isset($_GET['page']))
              {
                if(ctype_digit($_GET['page']))
                  {
                  $commentController->getCommentsAdmin(intval($_GET['page']));
                }
              }
              else
              {
                header ('Location: index.php?action=dashboard');
              }
              break;

            case 'showAllReportsComments':
              if(isset($_GET['page']))
                {
                  if(ctype_digit($_GET['page']))
                    {
                      $commentController->getReportsComments(intval($_GET['page']));
                    }
                }
               else
                {
                  header ('Location: index.php?action=dashboard');
                }
              break;

            case 'deletecomment': 
              if(isset($_GET['id']))
              {
                if(ctype_digit($_GET['id']))
                    {
                      $commentController->deleteComment(intval($_GET['id']));
                    }
              }
              else
                {
                  header ('Location: index.php?action=showAllCommentsAdmin&page=1');
                }
              break;

            case 'deletepost': 
              if(isset($_GET['id']))
              {
                if(ctype_digit($_GET['id']))
                    {
                      $postControler->deletePost(intval($_GET['id']));
                    }
              }
              else
                {
                  header ('Location: index.php?action=showAllPostsAdmin&page=1');
                }
              break;

            case 'editpost': 
              if(isset($_GET['id']))
              {
                if(ctype_digit($_GET['id']))
                    {
                      $postControler->editPost(intval($_GET['id']));
                    }
              }
              else
                {
                  header ('Location: index.php?action=showAllPostsAdmin&page=1');
                }
              break;

            case 'savepost':
                if(array_key_exists('id', $_GET) && isset($_GET['id'])) {
                    $postControler->savePost($_POST['author'],$_POST['title'],$_POST['textresum'], $_POST['content'], $_GET['id']);
                }
                else
                {
                  header ('Location: index.php?action=showAllPostsAdmin&page=1');
                }
              break;
            
            case 'createpost':
                $postControler->goCreationPost();
                
              break;

            case 'addpost':
                if (array_key_exists('title', $_POST))
                {
                  if(isset($_POST['textresum']))
                  {
                      if(isset($_POST['content']))
                      {
                        $postControler->addPost(
                            $_POST['author'], 
                            $_POST['title'],
                            $_POST['content'],
                            $_POST['textresum']
                            );
                      }
                  }
                }
                else
                {
                  header ('Location: index.php?action=dashboard');
                }
              break;

            case 'approvecomment': 
              if(isset($_GET['id']))
              {
                if(ctype_digit($_GET['id']))
                    {
                      $commentController->approveComment(intval($_GET['id']));
                    }
              }
              else
                {
                  header ('Location: index.php?action=showAllReportsComments&page=1');
                }
              break;

        	default:
        		header ('Location: index.php?action=showPage&page=1');
        		break;
        }
    }   
    else {
        	header ('Location: index.php?action=showPage&page=1');
           
        }
    