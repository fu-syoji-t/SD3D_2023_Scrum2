<link rel="stylesheet" href="css/thread.css">
<form name="loguinkanryou_form">
<div class=back>
        </div>
</div>
<div style="text-align:center;">
    <h1>予定追加しました</h1>
    <div class="section1 text-center">
    <?php
  //input.phpの値を取得 
    $pdo = new PDO('mysql:host=localhost;dbname=daysshare;charset=utf8','root','');//PDOでMySQLのデータベースに接続
    $sql = "INSERT INTO schedule(startday,importance,title,memo) VALUES (?,?,?,?)";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$_POST['startday'],PDO::PARAM_STR);
    $ps->bindValue(2,$_POST['importance'],PDO::PARAM_INT);
    $ps->bindValue(3,$_POST['title'], PDO::PARAM_STR);
    $ps->bindValue(4,$_POST['memo'],PDO::PARAM_STR);
    $ps->execute();  
    $searchArray = $ps->fetchAll();
?>
  </div>
  <button type="button" class="btn btn-outline-dark" type="button" onclick="location.href='../calendar/calendar.php'">次へ</button>
</div>
</div>   
</form>
