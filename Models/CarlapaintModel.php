<?php
class CarlapainModel extends BaseModel{
    public function getAll()
    {

        return;
        
    }
    public function carlapaint($ct)
    {
        $sql = "SELECT *
                    FROM occation AS a 
                    LEFT OUTER JOIN occationfile AS b ON a.OccationID=b.OccationID 
                    LEFT OUTER JOIN weblogin AS c ON c.WebLoginID=a.WebLoginID
                    WHERE c.WebLoginID=:WebLoginID AND OccationVisible= 1 AND FileID=3";    

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
        public function  getfileContract()
        {
            
            $headers = [
                'Authorization: Bearer '.self::As_TOKEN
            ];
            
            $curl = curl_init( 'https://api.box.com/2.0/files/756788264118' );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);
             
            
            return $result;

        }
        public function  getfoldersContract()
        {
            
            $headers = [
                'Authorization: Bearer '.self::As_TOKEN
            ];
            
            $curl = curl_init( 'https://api.box.com/2.0/folders/128140366125' );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);
             
            
            return $result;

        }

}    
?>

