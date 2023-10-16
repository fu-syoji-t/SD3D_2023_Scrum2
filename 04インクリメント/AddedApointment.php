<link rel="stylesheet" href="css/thread.css">
<form name="loguinkanryou_form">
<div class=back>  
<div style="text-align:left;"> 
    <?php
            date_default_timezone_set("japan");
            echo date("Y/m/d");
        ?>
        <br>
        </div>
        <div style="text-align:center;">
        <div id="headerdiv">
            <img src="img/logo.png">
        </div>
    </div>
</div>
<div style="text-align:center;">
    <h1>予定追加しました</h1>
    <div class="section1 text-center">
    <button type="button" class="btn btn-outline-dark" type="button" onclick="location.href='calendar.php'">　　次へ　　</button>
  </div>
</div>
</div>   
</form>