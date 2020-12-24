<?php
class ChatWork{
    CONST X_TOKEN = 'a9a26d4fc925b87c7b50ffa62d1b3362';
   
    public function getContactInfo()
    {
        $headers = [
            'X-ChatWorkToken: '.self::X_TOKEN
        ];

        $curl = curl_init( 'https://api.chatwork.com/v2/contacts' );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, true);
        return $result;
    }


    public function sendMessage($roomID,$msg)
    {
        $headers = [
            'X-ChatWorkToken: '.self::X_TOKEN
        ];

        $option=[
            'body' =>$msg,
            'self_unread' => 0
        ];

        $curl = curl_init( "https://api.chatwork.com/v2/rooms/{$roomID}/messages" );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($option));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);
    }

    public function getMessages($roomID,$force = 0)
    {
        $headers = [
            'X-ChatWorkToken: '.self::X_TOKEN
        ];


        $curl = curl_init( "https://api.chatwork.com/v2/rooms/{$roomID}/messages?force={$force}" );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($response);

        return $result;
    }


}    
?>