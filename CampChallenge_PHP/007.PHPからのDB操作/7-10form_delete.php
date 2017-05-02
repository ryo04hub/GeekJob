<!--
//以下の課題を、PHPからのPDOを用いて実現してください。profileIDで指定したレコードを削除できるフォームを作成してください

// 問題点：削除できなかった時にエラーメッセージを出すようにしたいが、まだできていない
try {
  ”エラーをキャッチしたい処理”;
  echo "削除に成功しました";
} catch (PDOException $Exception) {
  die('削除に失敗しました:' .$Exception->getMessage());
}

-->

<!-- 検索用フォーム -->
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>削除したいデータを入力する</title>
</head>
<body>

  <form action="" method="POST">
    DELETEしたいprofilesIDを入力してください<br>
    <input name="id" type="number"><br>
    <input type="submit"　name="btnSubmit" value="送信" >
  </form>

</body>
</html>


<?php

$id = $_POST['id'];

try {
  $pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','quickwinspc', 'Rsql1004');

  $sql = 'DELETE FROM profiles WHERE profilesID = ?';
  $query = $pdo_object->prepare($sql);
  $query->bindValue(1, $id, PDO::PARAM_INT);
  $query->execute();

} catch (PDOException $Exception) {
  die('エラーが発生しました:'.$Exception->getMessage());
}

?>
