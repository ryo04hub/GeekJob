<?php

//ファイルに自己紹介を書き出し、保存してください。
$fp = fopen('intro.txt', 'w');
fwrite($fp, '私の名前はさかぐちです');
fclose($fp);

?>
