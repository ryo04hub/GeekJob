<?php
//未完成版なので提出しないこと

/*
前による検索プログラムを実装する。
3人分のプロフィール(項目は課題「戻り値2」参照)をあらかじめ定義しておく。
引き数にそれらのプロフィールと文字列をとり、
戻り値は1人分のプロフィール情報を返却する。
引き数の文字が名前に含まれる(部分一致)プロフィール情報(複数名合致する場合は、
最初のプロフィールとする)を戻り値として返却する。
それ以降などは課題「戻り値2」と同じ扱いに
*/

//連想配列 + 多次元配列
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


/*
引き数にそれらのプロフィールと文字列をとり、
戻り値は1人分のプロフィール情報を返却する。
引き数の文字が名前に含まれる(部分一致)プロフィール情報(複数名合致する場合は、
最初のプロフィールとする)を戻り値として返却する。
*/

function show_profile($id, $name, $birthday, $address){
  global $people_info;

  if($name === 'Taro'){
      return $people_info['太郎'];
    } //return $people_info; // 一致した人の情報をreturn
  }

//出力
$a = show_profile(0, 'Taro', '19931004', 'Chiba');
foreach ($a as $key => $value) {
  echo $key . '：' . $value . "<br>";
}

?>
