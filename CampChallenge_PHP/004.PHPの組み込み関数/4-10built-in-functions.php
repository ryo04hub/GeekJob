<?php
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

function start_time_log() {
  $current_time = '現在時刻：' .date('Y年m月d日 h時i分s秒');

  $fp = fopen('logtest.txt', 'a');
  if ($fp != false) {
    // ファイルに書き込み
    fwrite($fp, $current_time."\n");
    // 書いたら、閉じる
    fclose($fp);
  }
}

function end_time_log() {
  $current_time = '終了時刻：' .date('Y年m月d日 h時i分s秒');

  $fp = fopen('logtest.txt', 'a');
  if ($fp != false) {
    // ファイルに書き込み
    fwrite($fp, $current_time."\n");
    // 書いたら、閉じる
    fclose($fp);
  }
}

//組み込み関数"preg_match"を使って、メアドが@gmail.comかを判別する関数
function gmail_checker($mail){
  start_time_log();

  if(preg_match("/@gmail.com/", $mail)){
    end_time_log();
    return "これはgmailです。\n";
  } else {
    end_time_log();
    return "これはgmailではありません。\n";
  }
}

//関数の実行
$mail  = 'test@test.com';
echo gmail_checker($mail);

// ログ内容の表示
echo file_get_contents('logtest.txt');

?>
