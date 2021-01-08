<?php
class BaseModel extends Database
{
    CONST As_TOKEN = 'afvHe7UpDWpQ8DuKkyyWgDiOPwzwwxYx';
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