<?php
class BaseModel extends Database 
{
    CONST As_TOKEN = 'P1QlIx2j8MVPVpOrZTKD4Qw5rgRB4aZZ';
    protected $conn;
    /**
     * 構築
     */
    public function __construct()
    {
        $this->conn = $this->connect();
    }
   
}
?>