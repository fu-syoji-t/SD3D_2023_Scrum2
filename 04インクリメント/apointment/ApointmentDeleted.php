<?php //セッションを開始する 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<title>削除完了</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
 <meta name="format-detection"content="telephone=no">
 <meta name="apple-mobile-web-app-capable" content="yes" />
 <meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equir="content-type" charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/apstyle.css" rel="stylesheet" type="text/css">
    <title>Document</title>    
</head>
<body>

<?php

require '../DAO.php';
$dao = new DAO();

echo $_SESSION['delete_id'];

$delete = $dao -> schedule_delete($_SESSION["delete_id"],$_SESSION['group_id']);
?>


<div style="text-align:center;">
<form action="?" method="post">

    <p>予定を削除しました</p>

    <button type = "submit" formaction="Apointment_check.php">スケジュール確認画面へと戻る</button>

</body>



