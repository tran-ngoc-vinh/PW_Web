<?php
    class HomePhotoModel extends BaseModel{
        CONST As_TOKEN = 'dfvrjAIqKhgpNOtp61BcFjMuGOYntQqR';

        public function getAll()
        {
    
            return;
            
        }
        public function homephoto()
        {
             $sql = "SELECT *
                     FROM occationfile AS a INNER JOIN occation AS b ON a.OccationID=b.OccationID INNER JOIN weblogin AS c ON c.WebLoginID=b.WebLoginID
                        WHERE OccationFileID= :OccationFileID AND OccationVisible= 1";    

            $pre = $this->conn->prepare($sql);

            $pre->bindValue(":OccationFileID",1,PDO::PARAM_INT);
            $r = $pre->execute();
           
            if((true !== $r) || (1 != $pre->rowCount())){
                echo('システムに誤りがある');
                exit();
            }else{
                $data = $pre->fetchAll(PDO::FETCH_ASSOC);               
                return $data;
                
            }
            
             
        }
        public function  getHomePhoto()
        {
            
            $headers = [
                'Authorization: Bearer '.self::As_TOKEN
            ];
            
            $curl = curl_init( 'https://api.box.com/2.0/folders/128140337585?s=iuc27fa847b42ehwcjshlkbxtqy5bzan' );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);
             
            
            return $result;

        }

        public function  getfileHomePhoto()
        {
            
            $headers = [
                'Authorization: Bearer '.self::As_TOKEN
            ];
            
            $curl = curl_init( 'https://api.box.com/2.0/files/754477704192' );
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