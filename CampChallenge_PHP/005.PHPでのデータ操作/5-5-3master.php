<?php
//要件は満たしているが、if文が多く効率が悪い。配列を用いたverをつくり、提出とする

/*
名前・性別・趣味を入力するページを作成してください。
また、入力された名前・性別・趣味を記憶し、次にアクセスした際に記録されたデータを初期値として表示してください。
※PHPと同時に、HTMLの知識が必要になります。
※入力フィールドの使い方を調べてみましょう。
*/

if (!isset($_POST['name'])){
  $show_name = " ";
} else {
  $show_name = $_POST['name'];
}

if (!isset($_POST['sex'])){
  $show_sex = " ";
} else {
  $show_sex = $_POST['sex'];
}

if (!isset($_POST['hobby'])){
  $show_hobby = " ";
} else {
  $show_hobby = $_POST['hobby'];
}
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

    名前：<input type="text" name="name" value  = "<?=  $show_name ?>"><br>
    性別：<input type="text" name="sex" value = "<?=  $show_sex ?>"><br>
    趣味：<input type="text" name="hobby" value = "<?=  $show_hobby ?>">
    <input type="submit"　name="btnSubmit" value="送信" >
  </form>
</body>
</html>
