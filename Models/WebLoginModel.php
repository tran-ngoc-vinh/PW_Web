<?php
class WebLoginModel extends BaseModel{
    const TABLE = 'WebLogin';

    public function getAll()
    {

        return;
        
    }
   

    public function findByWebLoginId($loginID)
    {
        $sql = "SELECT *
                FROM ".self::TABLE." 
                WHERE WebLoginID = :WebLoginID
                    AND Active = 1";
        $pre = $this->conn->prepare($sql);

        $pre->bindValue(":WebLoginID",$loginID,PDO::PARAM_STR);
        $r = $pre->execute();

        if((true !== $r) || (1 != $pre->rowCount())){
            echo('システムに誤りがある');
            exit();
        }else{
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            return $data[0];
        }
    }


    public function update()
    {
        
        
    }
}
?>