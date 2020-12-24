<?php
class QuotationController{
    public function quotation(){
        require_once('./Models/QuotationModel.php');
        $quotationModel = new QuotationModel();
        $quotationModel -> quotation();

        require_once('./Views/frontend/weblogin/quotation.php');
    }
}
?>