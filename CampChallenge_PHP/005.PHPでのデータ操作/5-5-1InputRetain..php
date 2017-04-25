<!DOCTYPE html>
<!-- 未完成。動きません -->
<html>


<!-- ユーザーからの入力を受け取って、5-5-2log.phpに入力された値を渡すまでの処理をする -->

<head>
  <meta charset="utf-8">
  <title>名前・性別・趣味を入力するページ</title>
</head>

<body>



<p>名前・性別・趣味を入力してください</p>

  <form method="POST" action="5-5-2log.php">
     <!-- userのインプットを配列で受け取る -->

     <!-- 注意点：<input type="text" name="account['name']">と連想配列のように記述すると使用できない。<input type="text" name="account[name]">と記述する必要がある。 -->
    名前：<input type="text" name="account[name]" value  = "<?= $showUserInput['name'] ?>"><br>
    性別：<input type="text" name="account[sex]" value = ""><br>
    趣味：<input type="text" name="account[hobby]" value = "">
    <input type="submit"　name="btnSubmit" value="送信" >
  </form>
</body>
</html>
