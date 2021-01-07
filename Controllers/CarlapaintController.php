<?php
class CarlapaintController extends BaseController{
    public function carlapaint(){
        $ct = $_SESSION['loginid']?? false;

        require_once('./Models/CarlapaintModel.php');
        $contractModel = new CarlapainModel();
        $data=$contractModel->carlapaint($ct);
        $posts=$contractModel->getfoldersContract();
        $post=$contractModel->getfileContract();
        
        require_once('./Views/frontend/weblogin/manageview/PostViewContract.php');
             
         $postView= new PostViewContract();
         $postView->showAllcarlapaint($data,$posts,$post);
    }
}
?>