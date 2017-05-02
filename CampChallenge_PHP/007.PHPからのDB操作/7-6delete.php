<?php
//以下の課題を、PHPからのPDOを用いて実現してください。課題「テーブルへ情報を格納」でINSERTしたレコードを指定して削除してください。SELECT*で結果を表示してください
try {

  $dsn = 'mysql:host=localhost;dbname=challenge_db;charset=utf8';
  $user = 'quickwinspc';
  $password = 'Rsql1004';

  $pdo_object = new PDO($dsn, $user, $password);

  $sql = 'DELETE FROM profiles WHERE profilesID = :id';
  $query = $pdo_object-> prepare($sql);
  $query->bindValue(':id', 7, PDO::PARAM_INT);
  $query -> execute();

  } catch (PDOException $Exception) {
    die('エラーが発生しました:'.$Exception->getMessage());
}


?>
