<?php

//2015年1月1日 0時0分0秒と2015年12月31日 23時59分59秒の差（ミリ秒）を表示してください。
$stamp1 = mktime(0, 0, 0, 1, 1, 2015);
$stamp2 = mktime(23, 59, 59, 12, 1 ,2015);
$result = $stamp2 - $stamp1;

echo $result;
?>
