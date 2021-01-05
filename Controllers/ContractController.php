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
           echo '<ul>';
                foreach ($posts as $key => $author)
                {
                    echo '<li>';
                    echo '' . $author['name'] . '<br/>';
                    echo ' ' . $author['id'] . '<br/>';
                    
                    
                    echo '</li>';
                }
                echo '</ul>';
            // require_once('./Views/frontend/weblogin/manageview/PostViewContract.php');
             
            //   $postView= new PostViewContract();
            //   $postView->showAllContract($data,$posts,$post);

        }
        
        
        
    }
?>
