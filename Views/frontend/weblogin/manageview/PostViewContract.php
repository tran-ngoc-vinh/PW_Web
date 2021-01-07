<?php
class PostViewContract{
    public function showAllContract($data,$posts,$post){
        
        require_once('./Views/frontend/weblogin/contract.php');
        
    }
    public function showAllHomePhoto($data,$posts,$post){
        require_once('./Views/frontend/weblogin/homephoto.php');
    }
    public function showAllCarlapaint($data,$posts,$post){
        require_once('./Views/frontend/weblogin/carlapaint.php');
    }
}
?>