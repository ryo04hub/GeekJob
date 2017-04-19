<?php

//2015年1月1日 0時0分0秒と2015年12月31日 23時59分59秒の差（ミリ秒）を表示してください。
$stamp1 = mktime(0, 0, 0, 12, 31, 2015);
$stamp2 = mktime(23, 59, 59, 1, 1 ,2015);
$result = $stamp1 - $stamp2;

echo $result;
?>
