<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>スレッド作成</title>
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
        <div id="headerdiv">
            <img src="img/logo.png">
        </div>
    </div>
</div>
<div style="text-align:center;">
<form method="post" action="AddedApointment.php">
    <input type="submit" value="作成">
  </div>
</form>
    
</div>
<br>
<button type="button" class="btn btn-outline-dark" onclick="history.back(-1)">◁</button>
</body>
</html>