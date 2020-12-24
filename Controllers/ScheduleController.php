<?php
class ScheduleController {
    public function schedule(){
        require_once('./Models/ScheduleModel.php');
        $scheduleModel= new ScheduleModel();
        $scheduleModel->schedule();

        require_once('./Views/frontend/weblogin/schedule.php');
    }
}
?>