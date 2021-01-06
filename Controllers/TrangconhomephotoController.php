<?php 
class TrangconhomephotoController extends BaseController{
    public function trangconhomephoto(){
        $ID=$_GET['file_id'];
      //  print_r($ID);
       // $this->view('frontend.weblogin.trangconcontract',$ID);
       require_once('./Views/frontend/weblogin/manageview/PostViewTrangcon.php');
             
       $postView= new PostViewTrangcon();
       $postView->showAlltrangconhomephoto($ID);
    }
}
?>