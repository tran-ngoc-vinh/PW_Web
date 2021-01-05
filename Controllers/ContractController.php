<?php
    class ContractController extends BaseController{

        public function contract(){
            $ct = $_SESSION['loginid']?? false;
            
                
            require_once('./Models/ContractModel.php');
            $contractModel = new ContractModel();
            $data=$contractModel->contract($ct);
            $posts=$contractModel->getContract();
            $post=$contractModel->getfileContract();
             
            echo("<pre>"); print_r($post); echo("</pre>"); 
           
            // require_once('./Views/frontend/weblogin/manageview/PostViewContract.php');
             
            //   $postView= new PostViewContract();
            //   $postView->showAllContract($data,$posts,$post);

        }
        
        
        
    }
?>
