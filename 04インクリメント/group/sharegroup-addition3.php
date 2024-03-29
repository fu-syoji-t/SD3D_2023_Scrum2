<?php //セッションを開始する 
session_start(); 
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
<link rel="stylesheet" type="text/css" href="../css/gcreate_3.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録完了画面</title>
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
    button {
font-family: "MS 明朝"; 
padding: 5px 10px; 
display: block;
margin: auto;
border-radius: 15px;
background-color:		#C0C0C0;
}     
</style>
</head>
<body class="tema">
<?php
require '../DAO.php';
$dao = new DAO();
$g = 0;
    
    while($g == 0){

        $rand = rand(1000,99999);
        $check_group = $dao -> check_group($rand);
    
        if(!isset($check_group["group_id"])){    
            $group = $dao ->ginsertUser($rand,$_SESSION["group"]["word"],$_SESSION["group"]["gname"]);
            $g = $g+1;
        }
    }

    echo 'グループの登録が完了しました！！<br>';

    echo $_SESSION["group"]["gname"].'のグループID　:　';
    echo $rand;

    foreach($_SESSION['group'] as $row){

        unset($row);
    }
?>
<form action="?" method="post"> 
<div class="container mt-3">
    <button type = "submit" formaction="sharegroup-display.php">グループログイン画面に戻る</button>
</div>
</form>
</body>
</html>
