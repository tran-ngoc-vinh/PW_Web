<?php
class HomephotoController{
    public function homephoto(){
        require_once('./Models/HomePhotoModel.php');
            $contractModel = new HomePhotoModel();
            $data=$contractModel->homephoto();
            $posts=$contractModel-> getHomePhoto();
            $post=$contractModel->getfileHomePhoto();
            
           
            require_once('./Views/frontend/weblogin/manageview/PostViewHomePhoto.php');
             
              $postView= new PostViewHomePhoto();
              $postView->showAllHomePhoto($data,$posts,$post);
    }
} 
?>