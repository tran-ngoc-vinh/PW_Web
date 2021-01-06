<?php
class TrangconcontractController extends BaseController{
    public function trangconcontract(){
    //     require_once('./Views/frontend/weblogin/contract.php');
       // echo("<pre>"); echo($_GET['file_id']); echo("</pre>"); 
        $ID=$_GET['file_id'];
        // print_r($ID);
    //    $this->view('frontend.weblogin.trangconcontract',$ID);
    require_once('./Views/frontend/weblogin/manageview/PostViewTrangcon.php');
             
    $postView= new PostViewTrangcon();
    $postView->showAlltrangconhomephoto($ID);
    //  echo ('<pre>');
    //  print_r($_GET);
    //  echo ('</pre>');
    
    }
}
?>