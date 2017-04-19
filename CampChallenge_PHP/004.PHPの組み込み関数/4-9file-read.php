<?php

//ファイルから自己紹介を読み出し、表示してください。
$fp = fopen('intro.txt', 'r');
echo fgets($fp);

?>
