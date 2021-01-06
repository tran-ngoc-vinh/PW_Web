<?php 
class TrangconhomephotoController extends BaseController{
    public function trangconhomephoto(){
        if(isset($_POST['id'])){
            header('LOCATION: ./');
            exit();
        }
        require_once('./Views/frontend/weblogin/trangconhomephoto.php');
    }
}
?>