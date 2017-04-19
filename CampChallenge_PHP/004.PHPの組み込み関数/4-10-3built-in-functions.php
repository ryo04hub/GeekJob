<?php
//完成版

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

//ファイルを開く
$fp = fopen('log.txt', 'w+');

//開始のタイミング・終了のタイミングで書き込みの処理をする関数
function write_log($run){

  global $fp;
  $current_time = date('Y年m月d日 h時i分s秒'); //現在日時の取得
  $start = $current_time . " 開始" . "<br>" ; //開始の時に書き込む内容
  $end = $current_time . " 終了". "<br>"; //終了の時に書き込む内容

  if ($run === '開始'){   // もし後述のgmail_ckecker関数が実行されたら・・・
    fwrite($fp, $start);
  } elseif ($run === '終了') {
    fwrite($fp, $end);
  } else {
    echo "gmail_checkerは正しく実行されませんでした。";
  }
}

//組み込み関数"preg_match"を使って、メアドが@gmail.comかを判別する関数
function gmail_checker($mail){
  write_log('開始');

  if(preg_match("/@gmail.com/", $mail)){
    echo "これはgmailです。" . "<br>";
    return write_log('終了');
  } else {
    echo"これはgmailではありません。" . "<br>";
    return write_log('終了');
  }
}

//各種結果を、変数に格納
$mail_result = gmail_checker('test@gmail.com');
$file_result = file_get_contents('log.txt');

//結果の表示
echo $mail_result;
echo $file_result;

//end
fclose($fp);

?>
