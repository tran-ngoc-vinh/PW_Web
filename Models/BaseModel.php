<?php
class BaseModel extends Database
{
    CONST As_TOKEN = 'mXCFe87eQ3svbz4Opzd1qrA7UP36qOQL';
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