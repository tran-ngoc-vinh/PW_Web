<?php
class System{

    public static function h($str)
    {
        return(htmlspecialchars($str, ENT_QUOTES, 'UTF-8'));
    }

    public static function HmacSha256($key='',$staffID=''){
        $str = "<d-m>{$staffID}<ichiro-mori@morien.co.jp>PaintWall";
        return (hash_hmac('sha256',$str,$key));
    }

    public static function HmacSha256Verify($key,$staffID,$hash){
        if(empty($hash) || empty($key) || empty($staffID)){
            return false;
        }
        
        // $str = "<d-m>{$staffID}<ichiro-mori@morien.co.jp>Dstage";
        $str = "<d-m><ichiro-mori@morien.co.jp>PaintWall";
        $hashNew = hash_hmac('sha256',$str,$key);
        return hash_equals($hashNew,$hash);
    }

    public static function createCsrf(){
        $crsfToken = '';
        try{

            if(function_exists('ramdom_bystes')){
                $crsfToken = hash('sha512',random_bytes(128));
            }else if(function_exists('openssl_random_pseudo_bytes')){
                $crsfToken = hash('sha512',openssl_random_pseudo_bytes(128));
            }
        }catch(Exception $e){
            //echo ('CSRFを作成のは失敗しました。'.$e->getMessage());
        }

        if('' === $crsfToken){
            echo('CSRFトークンが作成できないので完了します');
            exit;
        }

        while(5 <= count(@$_SESSION['login']['csrf'])){
            array_shift($_SESSION['login']['csrf']);
        };
        $_SESSION['csrf'] = $crsfToken;
        $_SESSION['login']['csrf'][$crsfToken] = time();
        
        return $crsfToken;
    }

    public static function isCsrfToken(){
        // CSRFトークンを把握
        if(true !== isset($_SESSION['csrf'])){
            return false;
        }
        $crsfToken = $_SESSION['csrf'];
        unset($_SESSION['csrf']);

        // セッションの中に「送られてきたトークン」が存在しなければ、false
        if(true !== isset($_SESSION['login']['csrf'][$crsfToken])){
            return false;
        }
        
        // 寿命を把握して
        $ttl = $_SESSION['login']['csrf'][$crsfToken];
        // 先にトークンは削除(使い捨てなので)
        unset($_SESSION['login']['csrf'][$crsfToken]);
        
        // 寿命チェック(5分以内)
        if(time() >= $ttl + 300){
            return false;
        }
        return true;
    }
   
    // public static function returnData($data,$err){
    //     $dataReturn=['err'=>$err,'data'=>$data];
    //     return $dataReturn;
    // }
}
?>