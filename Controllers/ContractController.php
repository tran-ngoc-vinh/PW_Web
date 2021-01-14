<?php
    class ContractController extends BaseController {
        
        public function contract(){
            $ct = $_SESSION['loginid']?? false;
            
                
            require_once('./Models/ContractModel.php');
            $contractModel = new ContractModel();
            $data=$contractModel->contract($ct);
            
            $this->view('frontend.weblogin.contract',$data);
              

        }
        public function homephoto(){
            $ct = $_SESSION['loginid']?? false;
            require_once('./Models/ContractModel.php');
            $contractModel = new ContractModel();
            $data=$contractModel->homephoto($ct);
             
            $this->view('frontend.weblogin.contract',$data);
               
        }
        public function carlapaint(){
            $ct = $_SESSION['loginid']?? false;
    
            require_once('./Models/ContractModel.php');
            $contractModel = new ContractModel();
            $data=$contractModel->carlapaint($ct);
            
            
            $this->view('frontend.weblogin.contract',$data);
        }
        public function quotation(){
            $ct = $_SESSION['loginid']?? false;
            require_once('./Models/ContractModel.php');
            $contractModel = new ContractModel();
            $data=$contractModel->quotation($ct);
    
            $this->view('frontend.weblogin.contract',$data);  
        }
        public function schedule(){
            $ct = $_SESSION['loginid']?? false;
            require_once('./Models/ContractModel.php');
            $contractModel = new ContractModel();
            $data=$contractModel->schedule($ct);
            
            $this->view('frontend.weblogin.contract',$data);
    
        }

    }
?>
