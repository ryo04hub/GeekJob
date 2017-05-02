<!--
//以下の課題を、PHPからのPDOを用いて実現してください。フォームからデータを挿入できる処理を構築してください。

//問題点：初回アクセス時に、値がnullにもかかわらずそのまま空白がデータべースに挿入されてしまう
 -->

<!-- 検索用フォーム -->
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>フォームからデータを挿入する</title>
</head>
<body>

  <form action="" method="POST">
    INSERTしたいデータを入力してください<br>
    名前：<input name="name" type="text"><br>
    電話番号：<input name="tell" type="tel"><br>
    年齢：<input name="age" type="text"><br>
    誕生日：<input name="birthday" type="date"><br>
    <input type="submit"　name="btnSubmit" value="送信" >
  </form>

</body>
</html>


<?php

$name = $_POST['name'];
$tell = $_POST['tell'];
$age = $_POST['age'];
$birthday = $_POST['birthday'];


//----------データベースから名前の部分一致で検索---------------

try {
  $pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','quickwinspc', 'Rsql1004');
  $pdo_object = new PDO($dsn, $user, $password);

  $sql = 'INSERT INTO profiles(name, tell, age, birthday) VALUES(:name, :tell, :age, :birthday)';
  $query = $pdo_object->prepare($sql);

  $query->bindValue(':name', $name, PDO::PARAM_STR);
  $query->bindValue(':tell', $tell, PDO::PARAM_STR);
  $query->bindValue(':age', $age, PDO::PARAM_INT);
  $query->bindValue(':birthday', "$birthday", PDO::PARAM_STR);

  $query->execute();

} catch (PDOException $Exception) {
  die('エラーが発生しました:'.$Exception->getMessage());
}

?>
