<?php
require_once '/../util/pdo-define.php';
require_once '/../util/pdo-util.php';

//セッション開始
session_start();

$obj_pdo = create_pdo();

$status = "none";

//セッションにセットされていたらログイン済み
if(isset($_SESSION["email"])) {
  $status = "logged_in";
} elseif(!empty($_POST["email"]) && !empty($_POST["password"])) {
  //ユーザ名が一致する行を探して、該当するパスワードを取得する
  $stmt = $obj_pdo->prepare("SELECT password FROM users WHERE email = :email");
  $stmt->bindparam(':email', $_POST["email"]);
  $stmt->execute();
  $password = $stmt->fetch();

  //ユーザーの入力したパスワードと、データベースにあるハッシュ化されたパスワードを比較する
  if(password_verify($_POST["password"], $password['password'])){
    $status = "ok";
    $_SESSION["email"] = $_POST["email"]; //セッションにEmailを保存
  } else {
    $status = "failed";
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/20e84d8b28.js"></script>
    <title>ログイン</title>
  </head>
  <body>
    <h1>ログイン</h1>

    <?php if($status == "logged_in"): ?>
      <p>ログイン済みです</p>
      <a href="/../main.php">トップへ戻る</a>

    <?php elseif($status == "ok"): ?>
      <p>ログインに成功しました</p>
      <a href="/../main.php">トップページへ</a>

    <?php elseif($status == "failed"): ?>
      <p>ログインに失敗しました</p>
      <a href="login.php">再ログインする</a>

    <?php else: ?>
      <form action="login.php" method="POST">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" placeholder="email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="password">
        </div>
        <button type="submit" class="btn btn-default">送信</button>
      </form>
    <?php endif; ?>
  </body>
</html>
