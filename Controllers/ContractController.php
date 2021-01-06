<?php
    class ContractController extends BaseController{

        public function contract(){
            $ct = $_SESSION['loginid']?? false;
            
                
            require_once('./Models/ContractModel.php');
            $contractModel = new ContractModel();
            $data=$contractModel->contract($ct);
            $posts=$contractModel->getfoldersContract();
            $post=$contractModel->getfileContract();
            
            // echo("<pre>"); print_r($posts); echo("</pre>");
            // echo("<pre>"); print_r($post); echo("</pre>");
            
        //  echo("<pre>"); print_r($posts['item_collection']['entries'][1]['id']); echo("</pre>"); 
         
                // foreach ($posts['item_collection']['entries'] as $item )
                // {
                //      echo ('<pre>');
                //      echo"{$item['name']}</br>";
                //      echo"{$item['id']}</br>";
                //      echo ('</pre>');
                    
                // }
            require_once('./Views/frontend/weblogin/manageview/PostViewContract.php');
             
              $postView= new PostViewContract();
              $postView->showAllContract($data,$posts,$post);
            // $this->view('frontend.weblogin.contract',$data,$posts,$post);
            

        }

        
    }
?>
