<?php
require_once 'util/pdo-define.php';
require_once 'util/pdo-util.php';

try {
  $obj_pdo = create_pdo();

  $status = "none";

  if(!empty($_POST["email"]) && !empty($_POST["password"])) {
    //パスワードをハッシュ化する
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    //ユーザ入力を使用するのでプリペアドステートメントを使用
    $stmt = $obj_pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam('password', $password);

    if($stmt->execute())
    $status = "ok";
    else
    //既に存在するユーザ名だった場合INSERTに失敗する
    $status = "failed";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}
?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="css/style.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <script src="https://use.fontawesome.com/20e84d8b28.js"></script>
     <title>新規登録ページ</title>
   </head>
   <body>
     <h1>新規登録</h1>
     <h3>登録情報を入力してください</h3>

     <!-- <form class="" action="user-registration.php" method="post">
       <input type="text" name="email" value="">
       <input type="text" name="password" value="">
       <input type="submit" name="submit" value="送信">
     </form> -->

     <form action="user-registration.php" method="post">
       <div class="form-group">
         <label for="email">Email address</label>
         <input type="email" class="form-control" name="email" placeholder="email">
       </div>
       <div class="form-group">
         <label for="password">Password</label>
         <input type="password" class="form-control" name="password" placeholder="password">
       </div>
       <button type="submit" class="btn btn-default">Submit</button>
     </form>


   </body>
 </html>
