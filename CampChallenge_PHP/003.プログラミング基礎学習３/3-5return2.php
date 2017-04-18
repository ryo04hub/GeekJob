<?php

/*戻り値としてある人物のid(数値),名前,生年月日、住所を返却し、
受け取った後は全情報を表示する*/

//関数を定義
function my_info($id, $name, $birthday, $address){
  $info = array($id, $name, $birthday, $address);
  return $info;
}

//関数に引数を渡して、$answerに格納
$answer = my_info("1", "ryo", "19931004", "chiba");

//$answerで受け取った情報をforeachを使って表示
foreach ($answer as $key => $value) {
  echo $value . "<br>";
}
 ?>
