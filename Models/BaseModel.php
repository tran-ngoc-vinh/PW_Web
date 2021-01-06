<?php
class BaseModel extends Database
{
    CONST As_TOKEN = 's3dAqzVBXBnDjPsqTjssmK8t9qRY5RhT';
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