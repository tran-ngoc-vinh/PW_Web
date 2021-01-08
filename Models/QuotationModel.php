<?php
class QuotationModel extends BaseModel{
    public function getAll()
    {

        return;
        
    }
    public function quotation($ct){
        {
            $sql = "SELECT *
                    FROM occation AS a 
                    LEFT OUTER JOIN occationfile AS b ON a.OccationID=b.OccationID 
                    LEFT OUTER JOIN weblogin AS c ON c.WebLoginID=a.WebLoginID
                    WHERE c.WebLoginID=:WebLoginID AND OccationVisible= 1 AND FileID=4";    

           $pre = $this->conn->prepare($sql);

           $pre->bindValue(":WebLoginID",$ct,PDO::PARAM_STR);
           $r = $pre->execute();
           if((true !== $r) ){
               echo('システムに誤りがある');
               exit();
           }else{
               $data = $pre->fetchAll(PDO::FETCH_ASSOC);               
               return $data;
               
           }
           
            
        }

    }
}
?>