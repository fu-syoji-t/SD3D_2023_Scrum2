<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>予定追加</title>
    <style>
         </style>
        <link href="css/thread.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class=back>  
<div style="text-align:left;"> 
    <?php
            date_default_timezone_set("japan");
            echo date("Y/m/d");
        ?>
        </div>
        <div style="text-align:center;">
    </div>
</div>
<div style="text-align:center;">
<input type="text" name="title" placeholder="予定内容">
    <p>開始日時</p>
    <input type="date" name="startday"><input type="time" name="starttime"value=><br>
    <p>重要度</p>
    <select name='importance'>
        <option value='notthing'>   </option>
        <option value='important'>超重要</option>
        <option value='normal'>重要</option>
        <option value='trifle'>大事</option>
    </select>
    <p>※重要度は<font color="red">'超重要'</font>、<font color="yellow">'重要'</font>、<font color="green">'大事'</font>、' 'の順で変わります。</p>
    <p>メモ
    <div class="z">
    <textarea name="memo"></textarea>
    </div>
    <p>※入力する予定を個人の予定にしますか？<br>
    はい<input type="radio" value="1" name="mastar1">
    いいえ<input type="radio" value="2" name="mastar2"><br></p>
    <button type="button" class="btn btn-outline-dark" type="button" onclick="location.href='AddedApointment.php'">予定を追加する</button>
</div>
    
</div>
<br>
<button type="button" class="btn btn-outline-dark" type="button" onclick="location.href='calendar.php'">◁</button>
</body>
</html>
