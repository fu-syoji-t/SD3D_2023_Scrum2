<?php 
session_start(); //セッションを開始する 

if(isset($_GET['message'])){
$message = $_GET['message'];
}

//セッションの情報が登録されている場合、グループログイン画面へと遷移する
if(isset($_SESSION["mail"]) == true && isset($_SESSION["name"]) == true){
    header('Location: sharegroup-display.php');
}

?>
<!DOCTYPE html>
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
    h1 {
    font-family: "MS 明朝";  
    text-align:center;
    font-size : 30px; 
    line-height : 2; 
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
  border-radius: 10px;
  border: 2px solid black;
  background-color:	#C0C0C0;

}
    label{
  text-align:center;
  font-family: "MS 明朝";
}
.error-message {
        color: red;
        font-weight: bold;
    }
 </style>
<body>
    <title>ログイン</title>   
    <div class=img style="text-align:center;">
    <img src="../img/daylogo.png" width="250">
  </div> 
   <div class="container mt-2"></div>
    <h1 class="test">ユーザーログイン</h1>
<form action="login_check.php" method="post">
    <br>
    <div id="error-message">
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="mb-3 mt-3 ">
        <label for="pwd" class="form-label">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
      </div>
    <p>アカウント作成はこちら</p>
    <a href="acnt_1.php">アカウントを新規登録</a><br>
    
    <?php
    if(isset($message)){
    echo '<p class="error-message">ログインに失敗しました。正しい情報を入力してください</p>';
    }
    ?>
    <br>
    <button type = "submit" class="btn btn-primary">ログイン</button>
</div>
<div class="spinner-border text-muted"></div>
  <div class="spinner-border text-primary"></div>
  <div class="spinner-border text-success"></div>
  <div class="spinner-border text-info"></div>
  <div class="spinner-border text-warning"></div>
  <div class="spinner-border text-danger"></div>
  <div class="spinner-border text-secondary"></div>
  <div class="spinner-border text-dark"></div>
  <div class="spinner-border text-light"></div>
</div>
</form>
<script type="text/javascript">
function check(){
    const mailPattern = /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
    let mail = document.userins.mail.value;
    let pass = document.userins.pass.value;
    let isSuccess = true;

    if(mailPattern.test(mail) == false && pass.length < 6){
        alert('メールアドレス、パスワードの形式が不正です。\nパスワードは6文字以上の必要があります');
        isSuccess = false;
        return false;
    }
    else if(mailPattern.test(mail) == false){
            alert('メールアドレスの形式が不正です。');
            isSuccess = false;
            return false;
    }
    else if(pass.length < 6){
        alert('パスワードは6文字以上の必要があります');
        isSuccess = false;
        return false;
    }
    if(isSuccess == true){
        return true;
    }
};
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!--
    <script>
    var loginForm = document.querySelector("form");
    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();

        var mailInput = document.querySelector('input[name="mail"]');
        var passInput = document.querySelector('input[name="pass"]');
        var errorContainer = document.getElementById("error-container");

        if (mailInput.value === "" || passInput.value === "") {
            errorContainer.textContent = "正しいメールアドレスとパスワードを入力してください。";
        } else {
            loginForm.submit();
        }
    });
</script>
!-->

</body>

