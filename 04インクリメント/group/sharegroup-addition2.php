<?php //セッションを開始する 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<title>グループ作成内容確認</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
 <meta name="format-detection"content="telephone=no">
 <meta name="apple-mobile-web-app-capable" content="yes" />
 <meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equir="content-type" charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/gcreate_2.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
    <body>
    <style>
      body{
        text-align: center;
        font-family: "MS 明朝";  
        font-size : 20px;
        background-color: #bcddff;
        background-image:
        linear-gradient(rgba(255,255,255,.5) 2px, transparent 2px),
        linear-gradient(90deg, rgba(255,255,255,.5) 2px, transparent 2px),
        linear-gradient(rgba(255,255,255,.28) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,.28) 1px, transparent 1px);
        background-size: 100px 100px, 100px 100px, 20px 20px, 20px 20px;
        background-position: -2px -2px, -2px -2px, -1px -1px, -1px -1px;
    } 
    h3 {
    font-family: "MS 明朝";  
    text-align:center;
    font-size : 20px; 
    line-height : 2.3; 
}
h4 {
    font-family: "MS 明朝";  
    text-align:center;
    font-size : 20px; 
    line-height : 2.3; 
}
button {
font-family: "MS 明朝"; 
padding: 5px 10px; 
display: block;
margin: auto;
border-radius: 15px;
background-color:		#C0C0C0;
}     
    </style>
    <?php
    require '../DAO.php';

    $dao = new DAO();

 //　ユーザ情報をセッション関数に登録　//
    $_SESSION['group'] =
    ['gname' => $_POST['gname'],
     'word' => $_POST['word']]
     
    ?>
    <form action = "?" method = "post">
    <div class="container mt-3">    
    <h3>以下の内容で登録を完了しますか？</h3>
    </div>
    <div class="container mt-3">
    <h4>グループ名</h4>
    </div>
    <?php
    echo '<h4>'. $_POST['gname'] .'</h4>';
    ?>
    <h4>パスワード</h4>
    <?php
    echo '<h4>'. $_POST['word'] .'</h4>';
    ?>
    <div class="container mt-3">
    <button type='submit' formaction="sharegroup-addition.php">修正する</button>
    </div>
    <div class="container mt-3">
    <button type='submit' formaction="sharegroup-addition3.php">登録する</button>
    </div>
    

    </body>
</html>