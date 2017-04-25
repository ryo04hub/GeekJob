 <?php
 //ファイルアップロード機能を作成し、ファイルの中身を読み込んで表示する機能を追加してください。

 $uploadedFile = file_get_contents($_FILES['userfile']['name']);
 echo $uploadedFile;

?>
