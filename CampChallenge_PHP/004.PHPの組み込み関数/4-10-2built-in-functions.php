<?php
//実験版につき提出しない

/*
紹介していないPHPの組み込み関数を利用して、処理を作成してください。

講義では紹介されていないPHPの組み込み関数はたくさん存在します。
PHPの公式サイトから関数を選び、実際にロジックを作成してみてください。

また、この処理を作成するに当たり、下記を必ず実装してください。
①処理の経過を書き込むログファイルを作成する。
②処理の開始、終了のタイミングで、ログファイルに開始・終了の書き込みを行う。
③書き込む内容は、「日時　状況（開始・終了）」の形式で書き込む。
④最後に、ログファイルを読み込み、その内容を表示してください。
*/

//組み込み関数"preg_match"を使って、メアドが@gmail.comかを判別する関数
function gmail_checker($mail){
  if(preg_match("/@gmail.com/", $mail)){
    echo "これはgmailです。";
    return true;
  } else {
    echo"これはgmailではありません。";
    return true;
  }
}

gmail_checker('test@gmail.com');


//ファイルを開く
$fp = fopen('logtest.txt', 'w+');

//現在日時の取得
$current_time = date('Y年m月d日 h時i分s秒');

//書き込み内容の定義
$start = $current_time . " 開始";
$end = $current_time . " 終了";

//開始のタイミング・終了のタイミングで書き込みの処理をする関数
function write_log(){
  if (gmail_checker === true){   // もし上記の組み込み関数が実行されたら・・・
    fwrite($fp, $start);
  } else { // もし終了したら・・
    fwrite($fp, $end);
  }
}


//結果の表示・end
var_dump($fp);
echo $fp;
fclose($fp);

?>
