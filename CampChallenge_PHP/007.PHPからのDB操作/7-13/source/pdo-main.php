<?php
require_once 'pdo-define.php';
require_once 'pdo-util.php';

function get_select_subjects($select='', $subjects=array()) {
    $arrSelect = explode(',', $select);
    $selectName = array();

    foreach($arrSelect as $id) {
        foreach($subjects as $val) {
            if ($val['id'] == $id) {
                $selectName[] = $val['name'];
                break;
            }
        }
    }

    return implode(', ', $selectName);
}

try {
    $pdo = create_pdo();
    $sql_select_users = "SELECT t_users.days, t_users.period, m_teachers.teacherName, m_subjects.subjectName FROM t_users LEFT JOIN m_teachers ON t_users.teachers = m_teachers.id LEFT JOIN m_subjects ON t_users.subjects = m_subjects.id";

    $users = pdo_select($pdo, $sql_select_users);


    $sql_select_subjects = 'SELECT * FROM ' . DB_MST_SUBJECT;
    $subjects = pdo_select($pdo, $sql_select_subjects);

    $pdo = null;

} catch (Exception $err) {
    $pdo = null;
    echo $err->getMessage();
    exit;
}

//1限目から4時限目までの配列をそれぞれ作成
$array_1 = array();
$array_2 = array();
$array_3 = array();
$array_4 = array();

foreach ($users as $key => $value) {
  switch ($value['period']) {
    case '1':
      $array_1[] = $value;
      break;
    case '2':
      $array_2[] = $value;
      break;
    case '3':
      $array_3[] = $value;
      break;
    case '4':
      $array_4[] = $value;
      break;
  }
}

// foreach ($users as $key => $value) {
//   if ($value['period'] == '1') {
//     $array_1[] = $value;
//   }
// }
// foreach ($users as $key => $value) {
//   if ($value['period'] == '2') {
//     $array_2[] = $value;
//   }
// }
// foreach ($users as $key => $value) {
//   if ($value['period'] == '3') {
//     $array_3[] = $value;
//   }
// }
// foreach ($users as $key => $value) {
//   if ($value['period'] == '4') {
//     $array_4[] = $value;
//   }
// }


?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>PDO課題0</title>
        <meta charset="UTF-8">
        <style>
            body {
                font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, sans-serif;
                fontsize:14px;
            }
            ul li {
                display: inline;
            }
            table tr th {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>○×塾　時間割管理</h1>
        <ul>
            <li>・<a href="pdo-user.php" target="_self">時間割登録</a></li>
            <li>・<a href="pdo-subject.php" target="_self">新規科目登録</a></li>
            <li>・<a href="pdo-teacher.php" target="_self">新規講師登録</a></li>
        </ul>
        <hr>
        <?php if (!empty($users)) { ?>
        <table border="1">
            <tr>
                <th width="100">時限</th>
                <th width="100">月</th>
                <th width="100">火</th>
                <th width="100">水</th>
                <th width="100">木</th>
                <th width="100">金</th>
            </tr>
            <tr>
              <?php
                ?>
              <td>1時限目</td>
              <?php
              foreach($array_1 as $user) {
                $result = $user;
              ?>
              <td><?=$result['subjectName'] ."<br>"  .$user['teacherName']?></td>
              <?php
              }
              ?>
            </tr>
            <tr>
              <td>2時限目</td>
              <?php
              foreach($array_2 as $user) {
                $result = $user;
              ?>
              <td><?=$result['subjectName'] ."<br>"  .$user['teacherName']?></td>
              <?php
              }
              ?>
            </tr>
            <tr>
              <td>3時限目</td>
              <?php
              foreach($array_3 as $user) {
                $result = $user;
              ?>
              <td><?=$result['subjectName'] ."<br>"  .$user['teacherName']?></td>
              <?php
              }
              ?>
            </tr>
            <tr>
              <td>4時限目</td>
              <?php
              foreach($array_4 as $user) {
                $result = $user;
              ?>
              <td><?=$result['subjectName'] ."<br>"  .$user['teacherName']?></td>
              <?php
              }
              ?>
            </tr>
        </table>
        <?php } else { ?>
        <p>現在登録されている受験者はいません。</p>
        <?php } ?>
    </body>
</html>
