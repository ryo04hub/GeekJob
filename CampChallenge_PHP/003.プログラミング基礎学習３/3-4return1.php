<?php

/*課題「ユーザー定義関数」で定義した関数に追記する形として、
戻り値　true(bool値)　を返却するように修正し、
関数の呼び出し側でtrueを受け取れたら「この処理は正しく実行できました」、
そうでないなら「正しく実行できませんでした」と表示する*/


function kakeru($num, $num5 = 5, $type = false){
          $multiply = $num * $num5; // 1つ目の引き数に2つ目の引き数を掛ける計算
            if ($type === false){
              $answer = $multiply; // falseならばそのまま表示
              return array($answer, true);
            } else {
              $answer = $multiply ** 2; //trueならば2乗の計算
              return array($answer, true);
            }
        }

$a = kakeru(5, 10, true);
echo $a[0] ."<br>";

//前の課題からの追記部分
if ($a[1] === true){ 
  echo "この処理は正しく実行できました";
} else {
  echo "正しく実行できませんでした";
}

?>
