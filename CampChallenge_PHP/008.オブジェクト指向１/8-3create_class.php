<!-- クラスの作成2
課題「クラスの作成1」のクラスを継承し、以下の機能を持つクラスを作成してください。
・２つの変数の中身をクリアするパブリックな関数 -->

<!-- 「変数をクリアする」の意味がよくわからないので保留 -->

<?php
require_once '\xampp\htdocs\GeekJob_xampp\Geek8\8-2create_class.php';

class Chihuahua extends Dog  {
  public function clearVar() {
    $a = 0;
    $t = 0;
  echo "このチワワの毛の色は" .$this->type ."です。";
  }
}

$wan = new Chihuahua();
$wan->setDog(12, '茶色');
$wan->clearVar();

?>
