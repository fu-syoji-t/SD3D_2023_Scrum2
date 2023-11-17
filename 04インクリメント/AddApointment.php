<?php //セッションを開始する 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>予定追加</title>
    <style>
         </style>
        <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class=back>  
        <div style="text-align:center;">
    </div>
</div>
<div style="text-align:center;">
<form action="?" method="post">
<form method="post" action="AddedApointment.php">
<?php
echo "<input type='text' name='title' placeholder='予定内容'>
        <p>開始日時</p>
        <input type='date' name='startday'><br>
        <p>重要度</p>
        <select name='importance'>
            <option value='1'>   </option>
            <option value='2'>超重要</option>
            <option value='3'>重要</option>
            <option value='4'>大事</option>
        </select>
        <p>※重要度は'<font color='red'>超重要</font>、'<font color='yellow'>重要</font>'、'<font color='green'>大事</font>'、' 'の順で変わります。</p>
        <p>メモ
        <div class='z'>
        <textarea name='memo'></textarea>
        </div>
        <p>※入力する予定を個人の予定にしますか？<br>
        <input type='checkbox' value='1' name='mastar'><br></p>";
    echo "<div class ='a'><button type = 'submit' formaction='../apointment/AddedApointment.php' >追加する</button></div>";
    ?>
</div>
</div>
</form>
<br>
<button type="button" class="btn btn-outline-dark" type="button" onclick="location.href='../calendar/calendar.php'">◁</button>
</body>
</html>
