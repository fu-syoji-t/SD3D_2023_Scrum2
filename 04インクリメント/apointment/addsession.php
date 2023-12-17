<?php //セッションを開始する 
session_start(); 
require '../DAO.php';
$dao = new DAO();

$startday = preg_replace("/-/", "", $_POST["startday"]);

$sd2 = intval($startday);

echo $sd2;
$importance = $_POST["importance"];
$mastar = isset($_POST['mastar']) ? $_POST['mastar'] : null;

echo "<br>".$mastar;

if(!isset($_POST["addition"])){
$searchArray = $dao->insert_schedule($_SESSION['group_id'],$_SESSION['id'],$_POST['title'],$startday,$importance,$_POST['memo'],$mastar);
}else{
$searchArray = $dao->update_schedule($_POST['addition'],$_POST['title'],$startday,$importance,$_POST['memo'],$mastar);
}
header('Location: ../apointment/AddedApointment.php');
?>