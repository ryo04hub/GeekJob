<?php
//---以下の課題を、PHPからのPDOを用いて実現してください。前回の課題「テーブルの作成とinsert」で作成したテーブルに自由なメンバー情報を格納する処理を構築してください---

try {

  $dsn = 'mysql:host=localhost;dbname=challenge_db;charset=utf8';
  $user ='quickwinspc';
  $password = 'Rsql1004';

  $pdo_object = new PDO($dsn, $user, $password);

  $sql = "INSERT INTO profiles(name, tell, age, birthday) VALUES(:name, :tell, :age, :birthday)";

  $query = $pdo_object -> prepare($sql);

  $query -> bindValue(':name','山田郎');
  $query -> bindValue(':tell','000-0000-0000');
  $query -> bindValue(':age',55);
  $query -> bindValue(':birthday','1999-01-01');

  $query -> execute();

  $pdo_object = null;

} catch (PDOException $Exception) {
    die('エラーが発生しました:'.$Exception->getMessage());
}


?>
