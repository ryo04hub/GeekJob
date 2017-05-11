<!-- クラスの作成1

以下の機能を持つクラスを作成してください。
・パブリックな２つの変数
・２つの変数に値を設定するパブリックな関数
・２つの変数の中身をechoするパブリックな関数
-->
<?php

class Dog {
  public $age = 0;
  public $type = '';

  public function setDog($a, $t) {
    $this->age = $a;
    $this->type = $t;
    echo $a .$t;
  }
}

?>
