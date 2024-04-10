﻿<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
    padding: 5px;
}
</style>
</head>
<body>

    <?php
    $data = array_values($arr);

    echo '<table>';

    echo '<tr><th></th>';
    foreach (array_keys($data[0]) as $key) {
        echo '<th>' . $key . '</th>';
    }
    echo '<th>横合計</th></tr>';

    $totalVertical = 0;
    foreach ($data as $rowKey => $row) {
        echo '<tr>';
        echo '<th>r' . ($rowKey + 1) . '</th>';
        $totalRow = 0;
        foreach ($row as $cell) {
            echo '<td>' . $cell . '</td>';
            $totalRow += $cell;
        }
        echo '<td>' . $totalRow . '</td>';
        echo '</tr>';
        $totalVertical += $totalRow;
    }

    echo '<tr><th>縦合計</th>';
    foreach (array_keys($data[0]) as $key) {
        $totalColumn = array_sum(array_column($data, $key));
        echo '<td>' . $totalColumn . '</td>';
    }
    echo '<td>' . $totalVertical . '</td></tr>';

    echo '</table>';
    echo '</body>';
    echo '</html>';
    ?>
</body>
</html>