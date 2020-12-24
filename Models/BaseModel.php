<?php
class BaseModel extends Database
{
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