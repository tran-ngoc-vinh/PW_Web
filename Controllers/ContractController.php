<?php
    class ContractController extends BaseController{
        public function contract(){
            require_once('./Models/ContractModel.php');
            $contractModel = new ContractModel();
            $data=$contractModel->contract();
            $posts=$contractModel->getContract();
            $post=$contractModel->getfileContract();
            
           
            require_once('./Views/frontend/weblogin/PostViewContract.php');
             
              $postView= new PostViewContract();
              $postView->showAllContract($data,$posts,$post);

        }
  
    }
?>