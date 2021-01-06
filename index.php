<?php
// 日付関数(date)を(後で)使うのでタイムゾーンの設定
date_default_timezone_set('Asia/Tokyo');
ob_start();
session_start();

    require_once("./Core/Database.php");
    require_once("./Core/System.php");
    // require_once("./Core/ChatWork.php");
    require_once("./Models/BaseModel.php");
    require_once("./Controllers/BaseController.php");
    //// require_once("./Core/manage.php");
    // require_once("./Controllers/ContractController.php");
    // require_once("./Controllers/HomephotoController.php");
    // require_once("./Controllers/CarlapaintController.php");
    // require_once("./Controllers/QuotationController.php");
    // require_once("./Controllers/ScheduleController.php");
    //require_once("./Controllers/TrangconcontractController.php");
    // require_once("./Controllers/TrangconhomephotoController.php");

    //get controller
    $controllerName = strtolower($_REQUEST['controller']?? 'WebLogin');
    $controllerName = ucfirst("{$controllerName}Controller");

    //get action
    $actionName = $_REQUEST['action']?? 'login';
    if(true !== file_exists("./Controllers/{$controllerName}.php")){
        $controllerName = 'WebLoginController';
    }
    require_once("./Controllers/{$controllerName}.php");

    if(true !== method_exists($controllerName,$actionName)){
        $actionName = 'login';
    }
    $controllerObj = new $controllerName;

    $controllerObj->$actionName();

?>