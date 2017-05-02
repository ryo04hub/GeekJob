<?php
//以下の課題を、PHPからのPDOを用いて実現してください。前回の課題「テーブルの作成とinsert」で作成したテーブルからprofileID=1の情報を取得し、画面に取得した情報を表示してください

try {
  $dsn = 'mysql:host=localhost;dbname=challenge_db;charset=utf8';
  $user = 'quickwinspc';
  $password = 'Rsql1004';

  $pdo_object = new PDO($dsn, $user, $password);
  $sql = 'SELECT * FROM profiles WHERE profilesID = 1';
  $query = $pdo_object->query($sql);

  foreach ($query as $row) {
    echo $row['profilesID'] . "/" .$row['name']. "/" .$row['tell'] . "/" .$row['age'] ."/" .$row['birthday'];
    echo"<br>";
  }

  } catch (PDOException $Exception) {
    die('エラーが発生しました:'.$Exception->getMessage());
}


?>
