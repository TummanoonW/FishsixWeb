<?php

    $dir = "../";
    include_once $dir . 'includer/includer.php'; //include Includer file to operate

    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_forum.php');
    Includer::include_fun($dir, 'fun_auth.php');
  
    $sess = new Sess();
    $apiKey = $sess->getAPIKey(); //get secret API Key
    $auth = $sess->getAuth();
    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 
    
    switch($io->method){
        case 'deleteComment':
            $id = $io->id;
            $result = FunForum::deleteComment($api, $id);
            if($result->success){
                Nav::goBack();
            }else{
                ErrorPage::initPage($dir, $result);
            }
            break;
        case 'postComment':
            $form = $io->post;
            $result = FunForum::postComment($api, $form);
            break;
        case 'upvotedownvote':
            $form = $io->post;
            if($io->get->voteID == "null"){
                $result = FunForum::addVote($api, $form);
            }else{
                $voteID = $io->get->voteID;
                $result = FunForum::updateVote($api, $voteID, $form);
            }
            break;
        case 'delete':
            $id = $io->id;
            $result = FunForum::delete($api, $id);
            if($result->success){
                Nav::goto($dir, App::$pageMyForums);
            }else{
                ErrorPage::initPage($dir, $result);
            }
            break;
        case 'update':
                $form = $io->post;

                if($_FILES['thumbnail']['error'] == 0){
                    $file = new File($dir, 'uploads/forums/thumbnails/');
                    $option = new FileOption();
                    $option->set(
                        TRUE,
                        TRUE,
                        TRUE,
                        'thumb',
                        1 * 1000 * 1000,
                        ['jpg', 'jpeg', 'png', 'gif']
                    );

                    $result = $file->upload('thumbnail', $option);
                    if($result->success) $form->thumbnail = $result->response->downloadURL;
                }
                if($form->thumbnail == '') unset($form->thumbnail);
              
                if($sess->checkUserExisted()) $form->authorID = $auth->ID;                
                
                if(!isset($form->ID)){
                    $result = FunForum::post($api, $form);
                    if($result->success){
                        Nav::goto($dir, App::$pageMyForums);
                        Console::log('Result', $result);
                    }else{
                        ErrorPage::initPage($dir, $result);
                        Console::log('Result', $result);
                    }
                }else{
                    $result = FunForum::edit($api, $form->ID, $form);
                    if($result->success){
                        Nav::goto($dir, App::$pageMyForums);
                        Console::log('Result', $result);
                    }else{
                        ErrorPage::initPage($dir, $result);
                        Console::log('Result', $result);
                    }
                }
            
            break;
        case 'submitComment':
            $form = $io->post;
            $form->authorID = $auth->ID;
            
            $result = FunForum::postComment($api, $form);
            if($result->success){
                InfoPage::initPage($dir, 'คอมเม้นสำเร็จ');
                Console::log('Result', $result);
            }else{
                //ErrorPage::initPage($dir, $result);
                Console::log('Result', $result);
            }
        break;
        case 'addVote':
            $vote = new stdClass();
            $vote->authorID = $io->get->authorID;           
            $vote->forumID = $io->get->forumID;  
                    
             
            $id = $vote->forumID; 
            $result = FunForum::getSingle($api, $id);
            $isVoteUp = $result->response->upvote;
            $isVoteDown = $result->response->downvote;
            $form->ID = $result->response->ID;
            $form->authorID = $result->response->authorID;
            $form->categoryID = $result->response->categoryID;
            $form->tags = $result->response->tags ;
            $form->thumbnail  = $result->response->thumbnail;
            $form->title = "Test";
            $form->content = $result->response->content;
            $form->views = $result->response->views;
            $form->isSpam = $result->response->isSpam;
            $form->date = $result->response->date;
            $form->comment = $result->response->comment;
            
          
            if($io->get->isUpVote == 0 ){
                $result = FunForum::addVote($api, $vote);
                $form->upvote = 0;
                $form->downvote = 0;
                $result = FunForum::edit($api, $id, $form);
                 
            }else {
                $result = FunForum::addVote($api, $vote);
                $form->upvote = 0;
                $form->downvote = 0;
                $result = FunForum::edit($api, $id, $form);
                
            }
            if($result->success){
              Nav::goto($dir, App::$pageForumSingle . "?id=" . $id );
            }else{
                //ErrorPage::initPage($dir, $result);
                Console::log('Result', $result);
            }
        break;
        case 'upDateVote':
            $vote = new stdClass();
            $vote->authorID = $io->get->authorID;           
            $vote->forumID = $io->get->forumID;  
                    
            $vote->isUpVote = $io->get->isUpVote;      
            $id = $vote->forumID;   
            $result = FunForum::addVote($api, $vote);
            if($result->success){
              Nav::goto($dir, App::$pageForumSingle . "?id=" . $id );
            }else{
                //ErrorPage::initPage($dir, $result);
                Console::log('Result', $result);
            }
        break;
        case 'upDateVote':
            $vote = new stdClass();
            $vote->authorID = $io->get->authorID;           
            $vote->forumID = $io->get->forumID;  
                    
            $vote->isUpVote = $io->get->isUpVote;      
            $id = $vote->forumID;   
            $result = FunForum::addVote($api, $vote);
            if($result->success){
              Nav::goto($dir, App::$pageForumSingle . "?id=" . $id );
            }else{
                //ErrorPage::initPage($dir, $result);
                Console::log('Result', $result);
            }
        break;
        default:
            Nav::gotoHome($dir); //return to home page
            break;
    }
    