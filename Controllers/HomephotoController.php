<?php
class HomephotoController{
    public function homephoto(){
        require_once('./Models/HomephotoModel.php');
        $homephotoModel = new HomePhotoModel();
        $homephotoModel -> homephoto();
        
        require_once('./Views/frontend/weblogin/homephoto.php');
    }
} 
?>