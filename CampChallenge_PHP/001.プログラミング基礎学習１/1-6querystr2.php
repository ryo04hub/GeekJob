<!DOCTYPE html>
<html>
<body>

<h1>クエリストリングの利用</h1>

<?php

/*
クエリストリングを利用して、以下の処理を実現してください。
スーパーのレジでレシートを作る仕組みを作成します。
クエリストリングで総額・個数・商品種別を受け取って処理します。
①商品種別は、３つ。１：雑貨、２：生鮮食品、３：その他
まずは、この商品種別を表示してください。
②総額と個数から１個当たりの値段を算出してください.
総額と１個当たりの値段を表示してください。
③3000円以上購入で4%、5000円以上購入で5%のポイントが付きます。
購入額に応じたポイントの表示を行ってください。
*/

/*
データの受け取りができているかを確認するためには、
http://localhost/1-6querystr2　の最後に?category=1
のように、URLの最後にクエリストリングをつけてデータを入力してあげる
例）
http://localhost/1-6querystr2.php?category=1
*/

//商品種別を設定
$category = ["雑貨", "生鮮食品", "その他"];

//総額と買った個数を変数として設定し、入力されたデータを取得して変数に格納
$totalPrice = $_GET["totalPrice"];
$buyNum = $_GET["buyNum"];

//一個当たりの金額の計算
$pricePerOne  = $totalPrice / $buyNum;

//ポイントの計算
$point3000 = $totalPrice * 0.04;
$point5000 = $totalPrice * 0.05;

//購入額に応じたポイントの表示
if ($totalPrice >= 3000 && $totalPrice < 5000) {
  $point = $point3000;
} elseif ($totalPrice >= 5000) {
  $point = $point5000;
} else {
  $point = 0;
}

//出力結果
echo "商品種別：" . $category[$_GET["category"]] . "<br>";
echo "お買い上げ総額：" . $totalPrice . "<br>";
echo "一個当たりの値段：" . $pricePerOne . "<br>";
echo "加算ポイント：" . $point;
?>

</body>
</html>
