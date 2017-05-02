<?php
//以下の課題を、PHPからのPDOを用いて実現してください。検索用のフォームを用意し、名前、年齢、誕生日を使った複合検索ができるようにしてください。

?>

<!-- 検索用フォーム -->
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>複合検索をする</title>
</head>
<body>

  <form action="" method="POST">
    検索したい内容を入力してください（複合検索に対応、名前は部分一致可）<br>
    名前：<input name="name" type="text" required><br>
    年齢：<input name="age" type="text"><br>
    誕生日：<input name="birthday" type="date"><br>
    <input type="submit"　name="btnSubmit" value="送信" >
  </form>

</body>
</html>


<?php
//初回訪問時、$_POSTがnullになりエラーが出るのを防ぐ
if (!isset($_POST['name'], $_POST['age'], $_POST['birthday'])) {
  $_POST['name'] = "";
  $_POST['age'] = "";
  $_POST['birthday'] = "";
}


try {

  $name = $_POST['name'];
  $age = $_POST['age'];
  $birthday = $_POST['birthday'];

  $pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','quickwinspc', 'Rsql1004');


  //名前を部分一致で検索し、年齢または誕生日と一致する場合に、表示する

  //全部をOR検索にしない理由　→　もしnameもORにすると、$nameに値が入力されていない場合に、すべての結果が表示されてしまうため。その原因は、$nameがnullだった場合に、50行目の""%$name%"が"%%"となってしまうが、それが全文検索の意味になってしまうから。
  $sql = 'SELECT * FROM profiles WHERE name LIKE :name AND (age = :age OR birthday = :birthday)';
  $query = $pdo_object->prepare($sql);

  $query->bindValue(':name', "%$name%", PDO::PARAM_STR);
  $query->bindValue(':age', $age, PDO::PARAM_INT);
  $query->bindValue(':birthday', $birthday, PDO::PARAM_STR);

  $query->execute();

  $result = $query->fetchAll();

  foreach ($result as $row) {
    echo $row['profilesID'] . "/" .$row['name']. "/" .$row['tell'] . "/" .$row['age'] ."/" .$row['birthday'];
    echo"<br>";

  }

  } catch (PDOException $Exception) {
    die('エラーが発生しました:'.$Exception->getMessage());
}

?>
