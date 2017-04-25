<?php
//提出版

/*
名前・性別・趣味を入力するページを作成してください。
また、入力された名前・性別・趣味を記憶し、次にアクセスした際に記録されたデータを初期値として表示してください。
※PHPと同時に、HTMLの知識が必要になります。
※入力フィールドの使い方を調べてみましょう。
*/

//HTMLのフォームから値が入力されていない場合に、半角スペースを入れてあげる処理
//初回訪問時に、$_POST['userInfo']が空になってしまうのを防ぐ。空のままにしておくと、初回訪問時にフォームに変な文字列が表示されてしまうため
if (!isset($_POST['userInfo'])){
  $userInfo = ['name'=>'', 'sex' =>'', 'hobby'=>''];
} else {
  $userInfo = $_POST['userInfo'];
}

/*
あるいは三興演算子を使って以下のように書くこともできる。
isset($_POST['userInfo']) ? $userInfo = $_POST['userInfo'] : $userInfo = ['name'=>'', 'sex' =>'', 'hobby'=>''];
*/

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>名前・性別・趣味を入力</title>
</head>
<p>名前・性別・趣味を入力してください</p>

<body>
  <form method="POST" action="">
<!--  注意：<input type="text" name="account['name']">と連想配列のように記述すると使用できない。下記のように <input type="text" name="account[name]">と記述する必要がある。 -->
    名前：<input type="text" name="userInfo[name]" value  = "<?=  $userInfo['name'] ?>"><br>
    性別：<input type="text" name="userInfo[sex]" value = "<?=  $userInfo['sex'] ?>"><br>
    趣味：<input type="text" name="userInfo[hobby]" value = "<?= $userInfo['hobby'] ?>">
    <input type="submit"　name="btnSubmit" value="送信" >
  </form>
</body>
</html>
