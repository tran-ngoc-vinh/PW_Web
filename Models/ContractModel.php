<?php
    class ContractModel extends BaseModel{
        

        public function getAll()
        {
    
            return;
            
        }
        public function contract($ct)
        {
             $sql = "SELECT *
                     FROM occation AS a 
                     LEFT OUTER JOIN occationfile AS b ON a.OccationID=b.OccationID 
                     LEFT OUTER JOIN weblogin AS c ON c.WebLoginID=a.WebLoginID
                     WHERE c.WebLoginID=:WebLoginID AND OccationVisible= 1 AND FileID=1";    

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
            
            $curl = curl_init( 'https://api.box.com/2.0/files/763453464353' );
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
            
            $curl = curl_init( 'https://api.box.com/2.0/folders/0' );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);
             
            
            return $result;

        }

        // public function refreshtoken()
        // {
        //     $headers = [
        //         'Content-Type: application/x-www-form-urlencoded'
        //     ];
    
        //     $option=[
        //         'client_id' =>'7f1kznjxox8r8u9bdfqeet19vijsgtsn',
        //         'client_secret' => '2ZLCyLtS2iaftmZsBwjrtYsrOdCJjbfa',
        //         'refresh_token' => '3TeBdAwLEEIDZt13i4vz5RtE08JauhvO6f11I7w5543ur9hFuMY3VDHRQr2rgLqR',
        //         'grant_type' => 'refresh_token'
        //     ];
    
        //     $curl = curl_init( "https://api.box.com/oauth2/token" );
        //     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        //     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //     curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($option));
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
        //     $response = curl_exec($curl);
        //     curl_close($curl);

        // }

    }   

?>