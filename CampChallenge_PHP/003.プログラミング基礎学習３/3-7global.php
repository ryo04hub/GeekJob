<?php
//未完成

/*
引き数、戻り値はなしの関数を用意。
初期値3のglobal値を2倍していく、
ローカルな値はstaticとしてその関数が何回実行されたのかを保持していくような関数である。
この関数を20回呼び出す
*/


$global_number = 3;

function count_run(){
  global $global_number;
  static $count = 0;

  $global_number *= 2;
  $count++;

  echo $count . "回目：" ;
  echo $global_number . "<br>";
}

for ($i=0; $i < 20; $i++) {
  count_run();
}

 ?>
