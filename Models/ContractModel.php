<?php
    class ContractModel extends BaseModel{
        CONST As_TOKEN = 'GzKxn6IbnaP2HBEDN98TRsR7nScqrZQ8';

        public function getAll()
        {
    
            return;
            
        }
        // public function contract($ct)
        // {
        //      $sql = "SELECT *
        //              FROM occation AS a 
        //              LEFT OUTER JOIN occationfile AS b ON a.OccationID=b.OccationID 
        //              LEFT OUTER JOIN weblogin AS c ON c.WebLoginID=a.WebLoginID
        //              WHERE c.WebLoginID=:WebLoginID AND OccationVisible= 1";    

        //     $pre = $this->conn->prepare($sql);

        //     $pre->bindValue(":WebLoginID",$ct,PDO::PARAM_STR);
        //     $r = $pre->execute();
           
        //     if((true !== $r) || (1 != $pre->rowCount())){
        //         echo('システムに誤りがある');
        //         exit();
        //     }else{
        //         $data = $pre->fetchAll(PDO::FETCH_ASSOC);               
        //         return $data;
                
        //     }
            
             
        // }

        public function contract()
        {
             $sql = "SELECT *
                     FROM occation AS a 
                     LEFT OUTER JOIN occationfile AS b ON a.OccationID=b.OccationID 
                     LEFT OUTER JOIN weblogin AS c ON c.WebLoginID=a.WebLoginID
                     WHERE b.OccationFileID=:OccationFileID AND OccationVisible= 1";    

            $pre = $this->conn->prepare($sql);

            $pre->bindValue(":OccationFileID",'756788264118?s=y3i0siu3tewiv3ky9fb5pseapaf6uwv5',PDO::PARAM_INT);
            $r = $pre->execute();
           
            if((true !== $r) || (1 != $pre->rowCount())){
                echo('システムに誤りがある');
                exit();
            }else{
                $data = $pre->fetchAll(PDO::FETCH_ASSOC);               
                return $data;
                
            }
            
             
        }
        
        public function  getContract()
        {
            
            $headers = [
                'Authorization: Bearer'.self::As_TOKEN
            ];

            $curl = curl_init( 'https://api.box.com/2.0/folders/128140677013?s=nplent87e2zq3d5pvats7opbs62fa8ah' );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);
             
            
            return $result;

        }

        public function  getfileContract()
        {
            
            $headers = [
                'Authorization: Bearer '.self::As_TOKEN
            ];
            
            $curl = curl_init( 'https://api.box.com/2.0/files/756788264118?s=y3i0siu3tewiv3ky9fb5pseapaf6uwv5' );
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