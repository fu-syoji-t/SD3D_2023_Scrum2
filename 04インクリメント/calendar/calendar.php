<?php

session_start();
require '../DAO.php';
$dao = new DAO();

// タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');
$time = date('H');
// 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // 今月の年月を表示
    $ym = date('Y-m');
}

// タイムスタンプを作成し、フォーマットをチェックする
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}


// 今日の日付 フォーマット　例）2021-06-3
$today = date('Y-m-j');

// カレンダーのタイトルを作成　例）2021年6月
$html_title = date('Y年n月', $timestamp);


// 方法１：mktimeを使う mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

// 方法２：strtotimeを使う
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// 該当月の日数を取得
$day_count = date('t', $timestamp);

// １日が何曜日か　0:日 1:月 2:火 ... 6:土
// 方法１：mktimeを使う
$youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
// 方法２
// $youbi = date('w', $timestamp);


// カレンダー作成の準備
$weeks = [];
$week = '';



// 第１週目：空のセルを追加
// 例）１日が火曜日だった場合、日・月曜日の２つ分の空セルを追加する
$week .= str_repeat('<td></td>', $youbi);


$schedule = $dao->schedule_hyouji($_SESSION['group_id']);
echo "<br><br>";
$hasSchedule = false;
for ($day = 1; $day <= $day_count; $day++, $youbi++) {
    // 2021-06-3
    $date = $ym . '-' . $day;

    if ($today == $date) {
        // 今日の日付の場合は、class="today"をつける
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }

    $hasSchedule = false; // その日に予定があるかどうかのフラグ

    foreach ($schedule as $row) {
        $startday = strtotime($row["startday"]);
        $schedule_class = "";

        if ($startday == strtotime($date)) {
            // 予定がある場合
            $hasSchedule = true;
            $schedule_class = strlen($row["title"]) > 5 ? 'long-text' : '';
            $week .= '<br><button type="submit" formaction="../apointment/Apointment_check.php" name="schedule" class="yotei_button ' . $schedule_class . '" value=' . $row["schedule_id"] . '>' . $row["title"] . '</button>';
        }
    }

    if (!$hasSchedule) {
        // その日に予定がない場合
        $week .= '<br>'; // 何も表示しないか、任意のメッセージを表示するなど、必要に応じて変更してください
    }

    $week .= '</td>';

    // 週終わり、または、月終わりの場合
    if ($youbi % 7 == 6 || $day == $day_count) {
        if ($day == $day_count) {
            // 月の最終日の場合、空セルを追加
            // 例）最終日が水曜日の場合、木・金・土曜日の空セルを追加
            $week .= str_repeat('<td></td>', 6 - $youbi % 7);
        }

        // weeks配列にtrと$weekを追加する
        $weeks[] = '<tr>' . $week . '</tr>';

        // weekをリセット
        $week = '';
    }
}
?>
<style>
  td {
    height: 50px; /* セルの高さを調整する値 */
  }

  .yotei_button {
    margin-top: 5px; /* ボタンがある場合、セルの上部に余白を追加 */
    margin-bottom: 5px; /* ボタンがある場合、セルの下部に余白を追加 */
  }
</style>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>PHPカレンダー</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css"> 

<div class="header">
        </div>
</head>
<body>
<div style="text-align:center;">
    <img src="../img/daylogo.png" width="250">
  </div>
  <header class="header">
  <input type="checkbox" id="menu" />
<label for="menu" class="menu">
  <span></span>
  <span></span>
  <span></span>
</label>

<nav class="nav">
  <ul>
  <li>
          <a href="../logout.php"><i class="fas fa-qrcode"></i>ログアウトする</a>
        </li>
        <li>
          <a href="../group/sharegroup-addition.php"><i class="fas fa-calendar-week"></i>グループを作る</a>
        </li>
        <li>
          <a href="../group/sharegroup-display.php"><i class="fas fa-calendar-week"></i>グループを切り替える</a>
        </li>
        <li>
          <a href="../apointment/Apointment_check.php"><i class="fas fa-calendar-week"></i>予定の確認をする</a>
        </li>
        <li>
          <a href="../apointment/AddApointment.php"><i class="fas fa-calendar-week"></i>予定を追加する</a>
        </li>
  </ul>
</nav>

    <!--ログインしたユーザーに挨拶-->
    <h2 style="text-align:center;">
    <?php

if(6<=$time && $time <= 11){
    echo "おはようございます！";
}else if(12 <=$time && $time<= 17){
    echo "こんにちは！";
}else if(18 <=$time && $time<= 24){
    echo "こんばんは！";

}
echo"今日は".date('Y年m月d日')."です！\n</br>";


foreach ($schedule as $row) {
    $startday = strtotime($row["startday"]);

    // 予定がある場合
    if ($startday == strtotime($today)) {
        $hasSchedule = true;
        break;
    }
}
echo "今日の予定は";
if ($hasSchedule) {
    echo "「".$row["title"]."」です！";
} else {
    echo "ありません";
}
?>
</h2>
<form action="?" method="post">  



<h1 style="text-align:center;">
<?php 
    echo "グループ名:".$_SESSION["group_name"];
    ?>
   
<body class="team">
<!--    <div class="button">
        <button type = "submit" formaction="../logout.php">ログアウト</button>
    </div>-->
</div>


</div>
    <div class="container">
    <div style="text-align:center;">
        <h3><div class = mb-5><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</div></a></h3>
        <table class="table table-bordered">
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
            </h1>

        </table>
        

        
        

    </div>
            </div>

    </form>
</body>
</html>
