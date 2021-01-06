<?php
class HomephotoController extends BaseController{
    public function homephoto(){
        $ct = $_SESSION['loginid']?? false;
        require_once('./Models/HomePhotoModel.php');
            $contractModel = new HomePhotoModel();
            $data=$contractModel->homephoto($ct);
            $posts=$contractModel->getfoldersContract();
            $post=$contractModel->getfileContract();
            
            require_once('./Views/frontend/weblogin/manageview/PostViewHomePhoto.php');
             
              $postView= new PostViewHomePhoto();
              $postView->showAllHomePhoto($data,$posts,$post);
           
    }
} 
?>