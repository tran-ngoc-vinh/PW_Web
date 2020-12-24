<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>チャットワーク</title>
    <link rel="stylesheet" href="./Public/css/frontend/chat.css">
</head>
<body>
    <div class="container">

        <form class="form-contact" action="" method="POST" >
            <ul class="ul-contact">
                <?php foreach($lstContacts as $item) :?>
                  <li class="item-contact" onclick="lblclick()"><?php echo($item['name'])?></li>
                <?php endforeach ?>
            </ul>
        </form>
        
        <form action="" class="form-chat-detail" method="POST">
            <div class="chat-content">
              <?php echo("<pre>"); print_r($conversation); echo("</pre>"); ?>
            </div>    
            <div class="form-chat">
                <textarea name="message"  cols="100" rows="10"></textarea>
                <button class="btnSendMsg">送信</button>
            </div>
        </form>
    </div>
</body>
</html>
<script>
    function lblclick(name = ''){
        // alert(name);
    }
</script>