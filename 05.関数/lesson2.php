<?php
// 以下をそれぞれ表示してください。（すべて改行を行って出力すること)
// 現在時刻を自動的に取得するPHPの関数があるので調べて実装してみて下さい。
// 実行するとその都度現在の日本の日時に合わせて出力されるされるようになればOKです。
// 日時がおかしい場合、PHPのタイムゾーン設定を確認して下さい。


// ・現在日時（xxxx年xx月xx日（x曜日））
// ・現在日時から３日後（yyyy年mm月dd日 H時i分s秒）
// ・現在日時から１２時間前（yyyy年mm月dd日 H時i分s秒）
// ・2020年元旦から現在までの経過日数 (ddd日)

date_default_timezone_set('Asia/Tokyo');
$currentTime = date('Y年m月d日');
$week_name = ['日','月','火','水','木','金','土'];
$week = date('w');
echo "・現在日時($currentTime($week_name[$week]曜日))";
echo '<br>';

date_default_timezone_set('Asia/Tokyo');

$currentDateTime = new DateTime();
$currentDateTime -> modify('+3 days');

$formattedDateTime = $currentDateTime -> format('Y年m月d日 H時i分s秒');
echo "・3日後の日時($formattedDateTime)" . '<br>';

date_default_timezone_set('Asia/Tokyo');

$currentDateTime = new DateTime();
$currentDateTime -> modify('-12 hours');

$formattedDateTime = $currentDateTime -> format('Y年m月d日 H時i分s秒');
echo "・12時間前の日時($formattedDateTime)" . '<br>';

$start = new DateTime('2020-01-01');

$end = new DateTime();

$span = $end -> diff($start);
$days = $span -> days;

echo "・2020年元旦から現在までの経過日数($days 日)";

?>