<?php //セッションを開始する 
session_start();
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
 <meta name="format-detection"content="telephone=no">
 <meta name="apple-mobile-web-app-capable" content="yes" />
 <meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equir="content-type" charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
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
    
    h2 {
    font-family: "MS 明朝";     
    text-align:center;
    font-size : 20px; 
    line-height : 4; 
}
h3 {
    font-family: "MS 明朝";  
    text-align:center;
    font-size : 15px; 
    line-height : 3; 
}
h4 {
    font-family: "MS 明朝";  
    text-align:center;
    font-size : 20px; 
    line-height : 3; 
}
button {
    font-family: "MS 明朝";  
    padding: 5px 10px; 
    display: block;
    margin: auto;
    border-radius: 15px;
    background-color:		#C0C0C0;
}
input{
    font-family: "MS 明朝";   
     padding: 5px 10px;
     width: 600x;
     border: 2px solid black;
     background-color:	#C0C0C0;

}
</style>
<title>新規登録完了画面</title>
<?php

require 'DAO.php';
$dao = new DAO();

    $_SESSION['user'] =
    ['mail' => $_POST['mail'],
     'pass' => $_POST['pass'],
     'name' => $_POST['name'],
];
    ?>
        
    
     <h2>以下の内容で登録を完了しますか？</h2>
     <h3>メールアドレス</h3>
     <?php
     echo '<h3>'. $_POST['mail'] .'</h3>';
     ?>
     <h3>パスワード</h3>
     <?php
     echo '<h3>'. $_POST['pass'] .'</h3>';
     ?>
     <h4>ニックネーム</h4>
     <?php
     echo '<h3>'. $_POST['name'] .'</h3>';
     ?>

<form action="?" method="post"> 
    <div class="container mt-3">
    <button type='submit' formaction="acnt_1.php" class="btn btn-primary">修正する</button><br><br>
    <button type='submit' formaction="acnt_3.php" class="btn btn-primary" >登録する</button></div>

</form>
</body>
