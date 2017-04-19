<?php

/*
以下の文章の「I」⇒「い」に、「U」⇒「う」に入れ替える処理を作成し、
結果を表示してください。
「きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます」
*/
$str = 'きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます';
$search = array('I', 'U');
$replace = array('い', 'う');

echo str_replace($search, $replace, $str);

?>
