<?php
// ＜アルゴリズムの注意点＞
// アルゴリズムではこれまでのように調べる力ではなく物事を論理的に考える力が必要です。
// 検索して答えを探して解いても考える力には繋がりません。
// まずは検索に頼らずに自分で処理手順を考えてみましょう。


// 以下は自動販売機のお釣りを計算するプログラムです。
// 150円のお茶を購入した際のお釣りを計算して表示してください。
// 計算内容は関数に記述し、関数を呼び出して結果表示すること
// $yen と $product の金額を変更して計算が合っているか検証を行うこと

// 表示例1）
// 10000円札で購入した場合、
// 10000円札x0枚、5000円札x1枚、1000円札x4枚、500円玉x1枚、100円玉x3枚、50円玉x1枚、10円玉x0枚、5円玉x0枚、1円玉x0枚

// 表示例2）
// 100円玉で購入した場合、
// 50円足りません。

$yen = 10000;   // 購入金額
$product = 1000; // 商品金額

function calc($yen, $product) {
    $change = $yen - $product;
    $money = [10000, 5000, 1000, 500, 100, 50, 10, 5, 1];
    $moneyName = ['10000円札', '5000円札', '1000円札', '500円玉', '100円玉', '50円玉', '10円玉', '5円玉', '1円玉'];
    $result = '';

    $index = array_search($yen, $money);
    if ($index !== false) {
        $result .= $moneyName[$index];
    } else {
        $result .= 'その他';
    }

    $result .= 'で購入した場合、<br>';

    if ($change < 0){
        return $result . abs($change) . '円足りません。';
    }

    foreach ($money as $index => $coin){
        $count = floor($change / $coin);
        $change -= $count * $coin;
        $result .= $moneyName[$index] . 'x' . $count . '枚、';
        }
    $result = rtrim($result, '、');
    return $result;

    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お釣り</title>
</head>
<body>
    <section>
        <?php
        echo calc($yen, $product);
        ?>
        <!-- ここに結果表示 -->
    </section>
</body>
</html>