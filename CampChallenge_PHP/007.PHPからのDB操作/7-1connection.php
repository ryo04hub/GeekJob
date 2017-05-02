<?php
//---以下の課題を、PHPからのPDOを用いて実現してください。Challenge_dbへのエラーハンドリングを含んだ接続の確立を行ってください---

$dsn = 'mysql:host=localhost;dbname=challenge_db;charset=utf8';
$user ='quickwinspc';
$password = 'Rsql1004';


$pdo_object = new PDO($dsn, $user, $password);

try {
  $pdo_object = new PDO($dsn, $user, $password);
} catch (PDOException $Exception) {
    die('接続に失敗しました:'.$Exception->getMessage());
}


?>
