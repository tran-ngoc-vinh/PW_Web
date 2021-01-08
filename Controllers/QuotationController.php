<?php
class QuotationController {
    public function quotation(){
        $ct = $_SESSION['loginid']?? false;
        require_once('./Models/QuotationModel.php');
        $quotationModel = new QuotationModel();
        $data=$quotationModel -> quotation($ct);

        require_once('./Views/frontend/weblogin/manageview/PostViewContract.php');
             
        $postView= new PostViewContract();
        $postView->showAllQuotatiion($data);   
    }
}
?>