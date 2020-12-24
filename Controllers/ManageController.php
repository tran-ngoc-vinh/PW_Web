 <?php
class ManageController {
    public function manage(){
        require_once('./Models/ManageModel.php');
        $manageModel=new ManageModel();
        $manageModel->manage();

        require_once('./Views/frontend/weblogin/manage.php');
    }
}
?> 
