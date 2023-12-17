<?php
//セッションの開始
session_start();

//DAOファイルと接続
require '../DAO.php';
$dao = new DAO();

//ログインユーザのユーザ情報取得
$user = $dao->loginUser($_POST['email'],$_POST['pswd']);

//ユーザ情報が正しければグループログイン画面へと遷移する
foreach($user as $row){
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['id'] = $row['account_id'];
    header('Location: ../group/sharegroup-display.php');
}
if(count($user) == 0){
    header('Location: login.php?message=error');
}

?>