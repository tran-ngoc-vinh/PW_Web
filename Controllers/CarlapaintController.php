<?php
class CarlapaintController{
    public function carlapaint(){
        require_once('./Models/CarlapaintModel.php');
        $carlapaintModel = new CarlapainModel();
        $carlapaintModel->carlapaint();
        
        require_once('./Views/frontend/weblogin/carlapaint.php');
    }
}
?>