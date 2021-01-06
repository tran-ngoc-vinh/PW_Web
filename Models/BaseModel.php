<?php
class BaseModel extends Database
{
    CONST As_TOKEN = '9DDXeOZkj5HG5xYK7xe6KTuwViiW8obG';
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