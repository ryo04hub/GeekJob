<?php
//以下の課題を、PHPからのPDOを用いて実現してください。profileIDで指定したレコードの、profileID以外の要素をすべて上書きできるフォームを作成してください

//改善点：更新前のテーブルと、更新後のテーブルをそれぞれ出すようにできれば、結果の確認ができて良いかもしれない
?>

<!-- 検索用フォーム -->
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>更新したいIDを入力する</title>
</head>
<body>

  <form action="" method="POST">
    UPDATEしたいprofilesIDを入力してください<br>
    <input name="id" type="number"><br>
    UPDATE内容を入力してください<br>
    名前：<input name="name" type="text"><br>
    電話番号：<input name="tell" type="tel"><br>
    年齢：<input name="age" type="text"><br>
    誕生日：<input name="birthday" type="date"><br>
    <input type="submit"　name="btnSubmit" value="送信" >
  </form>

</body>
</html>


<?php

try {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $tell = $_POST['tell'];
  $age = $_POST['age'];
  $birthday = $_POST['birthday'];

  $pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','quickwinspc', 'Rsql1004');

  $sql = 'UPDATE profiles SET name = :name, tell = :tell, age = :age, birthday = :birthday WHERE profilesID = :id';
  $query = $pdo_object->prepare($sql);

  $query->bindValue(':id', $id, PDO::PARAM_INT);
  $query->bindValue(':name', $name, PDO::PARAM_STR);
  $query->bindValue(':tell', $tell, PDO::PARAM_STR);
  $query->bindValue(':age', $age, PDO::PARAM_INT);
  $query->bindValue(':birthday', $birthday, PDO::PARAM_STR);

  $query->execute();

  } catch (PDOException $Exception) {
    die('エラーが発生しました:'.$Exception->getMessage());
}

?>
