<?php
//課題「continue」の処理のうち2人目まででforeachのループを抜けるようにする

$people_info = array(
  '太郎' => array(
    'id' => 0 ,
    'name' => 'Taro',
    'birthday' => '19931004',
    'address' => 'Chiba'
  ),
  'ギーク君' => array(
    'id' => 1 ,
    'name' => 'Geek-kun',
    'birthday' => '19960113',
    'address' => 'Tokyo'
  ),
  'プログラミングマン' => array(
    'id' => 2 ,
    'name' => 'Programming-man',
    'birthday' => '19980727',
    'address' => 'Kumamoto'
  )
);

foreach ($people_info as $keyA => $valueA) {
  if ($keyA == 'プログラミングマン'){
    break;
  } else {
    echo $keyA . "のプロフィール：". "<br>";
    foreach ($valueA as $keyB => $valueB) {
      if ($keyB == 'id' or $keyB == 'address') {      //$keyBに、Idまたはadressが含まれれていたらスキップ
        continue;
      } else {
          echo "　-" . $valueB . "<br>";
      }

    }
  }
  }

?>
