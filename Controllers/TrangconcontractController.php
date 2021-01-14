<?php
class TrangconcontractController extends BaseController{
    public function trangconcontract(){
        $ID=$_GET['file_id'];
        // print_r($ID);
        
        require_once('Models/SampleModel.php');
        $sample= new Sample();
        $access_token=$sample->boxapi();

        
        require_once('./Views/frontend/weblogin/manageview/PostViewTrangcon.php');
                
        $postView= new PostViewTrangcon();
        $postView->showAlltrangcon($ID,$access_token);
    
    
    }
}
?>