<?php
// セッションを開始する
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <title>予定内容</title>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta http-equir="content-type" charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/apstyle.css" rel="stylesheet" type="text/css">
</head>
<body>


<?php
require '../DAO.php';
$dao = new DAO();
$a = 0;

if (isset($_POST['schedule'])) {
    $a = $a + $_POST['schedule'];
    $schedule = $dao->schedule_check($_SESSION['group_id'], $a, 1);
} else {
    $schedule = $dao->schedule_check($_SESSION['group_id'], $a, 0);
}
?>
<div style="text-align:center;">
<form action="?" method="post">
    <button type="submit" formaction="../Calendar/calendar.php">カレンダー画面へ戻る</button><br>

    <?php
    foreach ($schedule as $check) {
        $mastar = $dao->mastar_check($check["schedule_id"]);

        echo "<br>最終更新者：" . $check["name"];
        if (isset($mastar[0]["schedule_id"])) {
            echo "🔐";
        }
        echo '<br>' . $check["startday"] . "<br>タイトル：" . $check["title"] . "<br>コメント：" . $check["memo"];

        if (isset($mastar[0]["schedule_id"])) {
            if ($mastar[0]["account_id"] == $_SESSION["id"]) {
                echo '<br><button type="submit" formaction="AddApointment.php" name="schedule" value=' . $check["schedule_id"] . ' >予定を変更する</button>
                <button type="submit" formaction="ApointmentDelete.php" name="delete" value=' . $check["schedule_id"] . ' >予定を削除する</button><br>';
            } else {
                echo "<div class=f><br>※この予定は個人の予定なので変更できません<br></div>";
            }
        } else {
            echo '<br><button type="submit" formaction="AddApointment.php" name="schedule" value=' . $check["schedule_id"] . ' >予定を変更する</button>
            <button type="submit" formaction="ApointmentDelete.php" name="delete" value=' . $check["schedule_id"] . ' >予定を削除する</button><br>';
        }
    }
    ?><br><br>

    <button type="submit" formaction="AddApointment.php">予定を追加する</button>
</div>
</form>
</body>
</html>
