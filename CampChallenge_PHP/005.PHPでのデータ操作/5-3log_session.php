<?php
//課題「クッキーの記録と表示」と同じ機能をセッションで作成してください。

session_start();

$_SESSION['LastLoginDate'] = date('Y年m月d日');
$lastDate = $_SESSION['LastLoginDate'];

echo 'おかえりなさいませ！<br>';
echo '前回のログイン日は' . $lastDate , 'です！';
 ?>
