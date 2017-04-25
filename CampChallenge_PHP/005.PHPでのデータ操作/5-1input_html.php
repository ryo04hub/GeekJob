<<?php

/*
以下の入力フィールドを持ったHTMLを、PHPで処理する想定で記述し、作成したHTMLの入力データを取得し、画面に表示する。
・名前（テキストボックス）、性別（ラジオボタン）、趣味（複数行テキストボックス）
*/

//想定するHTMTデータの取得
$name = $POST['txtName'];
$sex = $POST['rdoSex'];
$hobby = $POST['mulHobby'];

//出力
echo $name;
echo $sex;
echo $hobby;
?>
