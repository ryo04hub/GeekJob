<?php
/*引き数が3つの関数を定義する。1つ目は適当な数値を、2つ目はデフォルト値が5の数値を、
最後はデフォルト値がfalse(bool値)の$typeを引き数として定義する。
1つ目の引き数に2つ目の引き数を掛ける計算をする関数を作成し、
$typeがfalseの時はその値を表示、trueのときはさらに2乗して表示する。
例）function sample($□□□, $△△△, $type) // 引数が３つの関数書き出し部分(デフォルト値なし)*/

function kakeru($num, $num5 = 5, $type = false){
  $multiply = $num * $num5; // 1つ目の引き数に2つ目の引き数を掛ける計算
    if ($type === false){
      echo $multiply; // falseならばそのまま表示
    } else {
      $square = $multiply ** 2; //trueならば2乗の計算
      echo $square;
    }
}

kakeru(5, 10, true);

?>
