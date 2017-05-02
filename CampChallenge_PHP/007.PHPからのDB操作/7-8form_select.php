<!--
以下の課題を、PHPからのPDOを用いて実現してください。検索用のフォームを用意し、名前の部分一致で検索＆表示する処理を構築してください。同じページにリダイレクトするPOST処理と、POSTに値が入っているかの条件分岐を活用すれば、一つの.phpで完了できますので、チャレンジしてみてください
-->

<!-- 検索用フォーム -->
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>名前の部分一致で検索し、表示する</title>
</head>
<body>

  <form action="" method="POST">
    検索したい名前を入れてください<br>
    <input name="name" type="text">
    <input type="submit"　name="btnSubmit" value="送信" >
  </form>

</body>
</html>


<?php

try {

//$_POSTのままだと、のちに行う部分一致がなぜかうまくいかないため、あらかじめ変数に格納しておく。NG → "$_POST['name']", OK → "%$name%"
  $name = $_POST['name'];

  $dsn = 'mysql:host=localhost;dbname=challenge_db;charset=utf8';
  $user = 'quickwinspc';
  $password = 'Rsql1004';

  $pdo_object = new PDO($dsn, $user, $password);

  //----------データベースから名前の部分一致で検索---------------
  $sql = 'SELECT * FROM profiles WHERE name LIKE :name';
  $query = $pdo_object->prepare($sql);

  $query->bindValue(':name', "%$name%", PDO::PARAM_STR);

  $query->execute();
  $result = $query->fetchAll();

  foreach ($result as $row) {
    echo $row['profilesID'] . "/" .$row['name']. "/" .$row['tell'] . "/" .$row['age'] ."/" .$row['birthday'];
    echo"<br>";
    }
  } catch (PDOException $Exception) {
    die('接続に失敗しました:'.$Exception->getMessage());
}

?>
