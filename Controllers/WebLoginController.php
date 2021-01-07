<?php
class WebLoginController extends BaseController {

    public function __construct()
    {
        $this->loadModel('WebLoginModel');
        $this->loadModel('ChatWork');
    }

    /**
     * Login処理
     *
     * @return View
     */
    public function login(){
        // $hash = System::HmacSha256('123456');
        // echo($hash);
        //Viewからでーたを取得する 
        if(isset($_POST['id']) && isset($_POST['pass'])){
            //「Login」画面から
            $loginID = $_POST['id'];
            $pass = $_POST['pass'];
            if(empty($loginID) || empty($pass)){
                $this->showMsg('ユーザIDまたはパスワードは未定義です','err');
                exit();
            }

            $webLogin = new WebLoginModel;
            $user = $webLogin->findByWebLoginId($loginID);

            if(empty($user) ){
                $this->showMsg('ユーザは存在しない','err');
                exit();
            }
            
            if(true !== System::HmacSha256Verify($pass,$user['WebLoginID'],$user['LoginPW'])){
                $this->showMsg('ログインできません！','err');
                exit();
            }

            // $csrf = System::createCsrf();
            $_SESSION['loginid'] = $user['WebLoginID'];
            header('LOCATION: ?controller=WebLogin&action=manage');
        }else{
            $this->view('frontend.weblogin.login');
        }
        
    }

    public function manage()
    {
        //check session
        // if(true !== isset($_SESSION['csrf'])){
        //     header('LOCATION: ./');
        //     exit();
        // }

        // $csrf = $_SESSION['csrf'];

        $this->view('frontend.weblogin.manage');
    }


    public function chat()
    {
        // //check session
        // if(true !== isset($_SESSION['csrf'])){
        //     header('LOCATION: ./');
        //     exit();
        // }

        // $csrf = $_SESSION['csrf'];
        // unset($_SESSION['csrf']);

        if(true !== isset($_SESSION['loginid'])){
            header('LOCATION: ./');
            exit();
        }
        
        $chatWork = new ChatWork;

        $lstContacts = $chatWork->getContactInfo();
        $lstMessage = $chatWork->getMessages('140999320',1);

        $data=[
            'a'=>$lstContacts,
            'b'=>$lstMessage
        ];
        
        // if(isset($_POST['chat_msg']) && (true !== empty($_POST['chat_msg']))){
        //     $message = $_POST['chat_msg'];
        //     $this->sendMsg($message);
        // }

        $this->view('frontend.weblogin.chat',$data);
    }




    public function sendMsg($message){
        $chatToken = 'a9a26d4fc925b87c7b50ffa62d1b3362';
        $chatGroupId = '205063644';
        // print_r($message);

        
        // $headers = [
        //     'X-ChatWorkToken: '.$chatToken
        // ];

        // $option = [
        //     'body' => $message
        // ];

        // $ch = curl_init( 'https://api.chatwork.com/v2/rooms/'.$chatGroupId.'/messages' );
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($option));
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $response = curl_exec($ch);
        // curl_close($ch);

        $headers = [
            'X-ChatWorkToken: '.$chatToken
        ];

        $option = [
            'body' => $message
        ];

        $ch = curl_init( 'https://api.chatwork.com/v2/rooms' );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $result = json_decode($response, true);
        echo("<pre>");
        print_r($result);
        echo("</pre>");

        curl_close($ch);

    }


    public function showMsg($msg,$type){
        if('err' === $type){
            echo("<h1 style='color:red'>{$msg}</h1>");
        }else{
            echo("<h1 style='color:red'>{$msg}</h1>");
        }
        echo("<a href='./'>ログインページへ戻る</a>");
        exit();
    }
}
?>