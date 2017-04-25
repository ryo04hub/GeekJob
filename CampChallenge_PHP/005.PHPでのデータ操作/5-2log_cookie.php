<?php
//クッキーに現在時刻を記録し、次にアクセスした際に、前回記録した日時を表示してください。

//現在時刻を取得し、クッキーに記録
$access_time = date('Y年m月d日');
setcookie('LastLoginDate', $access_time);

//次回の訪問で前回のアクセス記録の表示
$lastDate = $_COOKIE['LastLoginDate'];

echo 'おかえりなさい！<br>';
echo '前回のログイン日時は' . $lastDate . 'です！';

 ?>
