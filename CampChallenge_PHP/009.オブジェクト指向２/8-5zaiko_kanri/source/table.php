<?php
require_once '/util/pdo-define.php';
require_once '/util/pdo-util.php';

try {
  //pdo-util.phpで定義した関数を使い、データベースに接続
  $obj_pdo = create_pdo();

//DBのstockテーブルからすべての情報を取得
  $sql_select_users = "SELECT * FROM stock";
  $stmt = $obj_pdo->prepare($sql_select_users);
  $stmt->execute();
  $stocks = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $obj_pdo = null;

} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/20e84d8b28.js"></script>
    <title>商品一覧</title>
  </head>
  <body>
    <?php include 'header.php' ?>

    <h1>在庫管理システム 商品一覧ページ</h1>
    <table class="table table-hover" text-align: center;>
      <tr border="1">
        <th width="100">商品名</th>
        <th width="100">取引先名</th>
        <th width="100">在庫数</th>
      </tr>
      <tr>
        <?php
        foreach ($stocks as $stock) {
            ?>
          <tr>
            <td><?=$stock['item']?></td>
            <td><?=$stock['company']?></td>
            <td><?=$stock['stock']?></td>
          </tr>
          <?php
          }
          ?>
      </tr>
    </table>
    <a href="main.php">トップへ戻る</a>
  </body>
</html>
