<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/20e84d8b28.js"></script>
  <title>商品情報登録ページ</title>
</head>
<body>
  <?php include 'header.php' ?>

  <form class="" action="registration.php" method="post">
    商品名<input type="text" name="item" value="">　
    取引先名<input type="text" name="company" value="">　
    在庫数<input type="text" name="stock" value="">　
    <input type="submit" name="submit" value="送信">
  </form>
  <a href="main.php"><br>トップへ戻る</a>
</body>
</html>

<?php
require_once '/util/pdo-define.php';
require_once '/util/pdo-util.php';

//null対策
if (!isset($_POST['item'], $_POST['stock'], $_POST['company'])) {
  $item = '';
  $stock = '';
  $company = '';
} else {
  $item = $_POST['item'];
  $company = $_POST['company'];
  $stock = $_POST['stock'];

  try {

    $obj_pdo = create_pdo();

    $sql = 'INSERT INTO stock(item, company, stock) VALUE(:item, :company, :stock)';

    $query = $obj_pdo->prepare($sql);

    $query->bindvalue (':item', $item);
    $query->bindvalue (':company', $company);
    $query->bindvalue (':stock', $stock);

    $query->execute();

    $obj_pdo = null;

  } catch (PDOException $Exception) {
    die('エラーが発生しました:'>$Exception->getMessage());
  }

}


?>
