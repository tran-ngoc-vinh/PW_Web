<?php
class TrangconcontractController extends BaseController{
    public function trangconcontract(){
    //     require_once('./Views/frontend/weblogin/contract.php');
       // echo("<pre>"); echo($_GET['file_id']); echo("</pre>"); 
        $ID=$_GET['file_id'];
        // print_r($ID);
       // $this->view('frontend.weblogin.trangconcontract');
        require_once('./Views/frontend/weblogin/trangconcontract.php');
        $postView->showAlltrangcon($ID);
    //  echo ('<pre>');
    //  print_r($_GET);
    //  echo ('</pre>');
    
    }
}
?>