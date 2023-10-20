<?php 




$today = filter_input(INPUT_POST, 'today');
$monthNext = filter_input(INPUT_POST, 'monthNext');
$yearNext = filter_input(INPUT_POST, 'yearNext');
$monthPrev = filter_input(INPUT_POST, 'monthPrev');
$yearPrev = filter_input(INPUT_POST, 'yearPrev');


if($today==1){
  // 現在の年月を取得
    $month = date('n');
    $year = date('Y');
}
if($monthNext > 12){
  // 次のボタンを押した時、12月を超えた場合は月を1月にし、年に1を足す
    $monthNext = 1;
    $yearNext++;
}
if($monthPrev === "0"){
    // 前のボタンを押した時、月が0になった場合は月を12月にし、年から1を引く
    $monthPrev = 12;
    $yearPrev--;
}
//場合分け $monthNextにデータがあれば、$monthNextを
// $monthNextにデータがなければ、$monthPrevを
// $monthNextと$monthPrevにデータがなれけば、date('n')を入れる。
$month = $monthNext??$monthPrev??date('n');
$year =$yearNext??$yearPrev??date('Y');

// 月末日を取得
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
$calendar = array();
$j = 0;



// 月末日までループして、日付を$calendarの配列に挿入する
for ($i = 1; $i < $last_day + 1; $i++) {
  // 曜日を取得
  $week = date('w', mktime(0, 0, 0, $month, $i, $year));
  // 1日の場合
  if ($i == 1) {
      // 1日目の曜日までをループ
      for ($s = 1; $s <= $week; $s++) {
          // 前半に空文字をセット
          $calendar[$j]['day'] = '';
          $j++;
      }
  }
  // 配列に日付をセット
  $calendar[$j]['day'] = $i;
  $j++;
  
  // 月末日の場合
  if ($i == $last_day) {
      // 月末日から残りをループ
      for ($e = 1; $e <= 6 - $week; $e++) {
          // 後半に空文字をセット
          $calendar[$j]['day'] = '';
          $j++;
      }
  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>カレンダー</title>
  <link rel="stylesheet" href="css/Calendar.css">
</head>

<body>
  <table>
    <thead>
      <tr>
        <!-- 前月に行くボタン「《」を押した時のフォームアクション-->
        <form action="" method="post">
          <th><button type="submit" id="prev">
              &laquo;
              <!-- ボタンを押された時に送信されるデータを保持。inputタグのtype="hidden"は、画面に表示されない。 -->
              <input type="hidden" name="monthPrev" value="<?php echo $month-1;?>">
              <input type="hidden" name="yearPrev" value="<?php echo $year;?>">
            </button></th>
        </form>
        <!-- ここは、現在表示されている年と月を表示するコードです。 -->
        <th id="title" colspan="5"><?php echo $year; ?>年<?php echo $month; ?>月
        </th>
        <!-- 次月に行くボタン「》」を押した時のフォームアクション-->
        <form action="" method="post">
          <th><button type="submit" id="next">
              &raquo;
              <input type="hidden" name="monthNext" value="<?php echo $month+1;?>">
              <input type="hidden" name="yearNext" value="<?php echo $year;?>">
            </button></th>
        </form>
      </tr>
      <tr>
        <th class="red">日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th class="blue">土</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <!-- $calendarの配列で入っているデータをループで表示していく。-->
        <?php $cnt = 0; ?>
        <!-- 連想配列から繰り返し値を取り出す -->
        <?php foreach ($calendar as $key => $value): ?>
          
        <td>
          <p>
            <?php $cnt++; ?>
            <!-- 1つずつ値を取り出して表示する部分 -->
            <?php echo $value['day']; ?>
            
          </p>
        </td>
        <!-- tdが7つになったら、次のtrを作成して次の行に移動 -->
        <?php if ($cnt == 7): ?>
      </tr>
      <tr>
        <?php $cnt = 0; ?>
        <?php endif; ?>
        <?php endforeach; ?>
      </tr>
    </tbody>
    <tfoot>
      <tr>
         <!-- 現在に行くボタンを押した時のフォームアクション-->
        <form action="" method="post">
          <td colspan="7">
            <button type="submit" id="today"> 現在に戻る
              <input type="hidden" name="today" value="1">
            </button>
          </td>
        </form>
      </tr>
    </tfoot>
  </table>
</body>
</html>