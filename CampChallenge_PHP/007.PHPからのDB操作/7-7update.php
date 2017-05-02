<?php
//以下の課題を、PHPからのPDOを用いて実現してください。profileID=1のnameを「松岡 修造」に、ageを48に、birthdayを1967-11-06に更新してください

try {
  $dsn = 'mysql:host=localhost;dbname=challenge_db;charset=utf8';
  $user = 'quickwinspc';
  $password = 'Rsql1004';

  $pdo_object = new PDO($dsn, $user, $password);
  $sql = 'UPDATE profiles SET name = :name, age = :age, birthday = :birthday WHERE profilesID = :id';
  $query = $pdo_object-> prepare($sql);

  $query->bindValue(':id', 1, PDO::PARAM_INT);
  $query->bindValue(':name', '松岡修造', PDO::PARAM_STR);
  $query->bindValue(':age', 48, PDO::PARAM_INT);
  $query->bindValue(':birthday', '1967-11-06', PDO::PARAM_STR);

  $query -> execute();

  } catch (PDOException $Exception) {
    die('エラーが発生しました:'.$Exception->getMessage());
}

?>
