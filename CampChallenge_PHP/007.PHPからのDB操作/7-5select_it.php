<?php
//以下の課題を、PHPからのPDOを用いて実現してください。nameに「茂」を含む情報を取得し、画面に取得した情報を表示してください

try {
  $dsn = 'mysql:host=localhost;dbname=challenge_db;charset=utf8';
  $user = 'quickwinspc';
  $password = 'Rsql1004';

  $pdo_object = new PDO($dsn, $user, $password);

  //LIKEの部分一致の部分がうまく動作してしない
  //解決：LIKE"%:name%"は動かない（参考→http://6rats.blog62.fc2.com/blog-entry-64.html）
  $sql = 'SELECT * FROM profiles WHERE name LIKE :name';
  $query = $pdo_object->prepare($sql);

  $query->bindValue(':name', "%茂%", PDO::PARAM_STR);

  $query->execute();
  $result = $query->fetchAll();

  var_dump($result);

  foreach ($result as $row) {
    echo $row['profilesID'] . "/" .$row['name']. "/" .$row['tell'] . "/" .$row['age'] ."/" .$row['birthday'];
    echo"<br>";
  }
  
  } catch (PDOException $Exception) {
    die('エラーが発生しました:'.$Exception->getMessage());
}


?>
