<?php
class HomephotoController{
    public function homephoto(){
        $ct = $_SESSION['loginid']?? false;
        require_once('./Models/HomePhotoModel.php');
            $contractModel = new HomePhotoModel();
            $data=$contractModel->homephoto($ct);
            
            
           
            require_once('./Views/frontend/weblogin/manageview/PostViewHomePhoto.php');
             
              $postView= new PostViewHomePhoto();
              $postView->showAllHomePhoto($data);
    }
} 
?>