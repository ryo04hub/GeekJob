<?php

require_once 'pdo-define.php';
require_once 'pdo-util.php';

$subjects = array();
try {
    $pdo = create_pdo();

    $sql_select_subjects = 'SELECT * FROM ' . DB_MST_SUBJECT;
    $subjects = pdo_select($pdo, $sql_select_subjects);

    $pdo = null;

} catch (Exception $err) {
    $pdo = null;
    echo $err->getMessage();
    exit;
}

$teachers = array();
try {
    $pdo = create_pdo();

    $sql_select_teachers = 'SELECT * FROM ' . DB_MST_TEACHER;
    $teachers = pdo_select($pdo, $sql_select_teachers);

    $pdo = null;

} catch (Exception $err) {
    $pdo = null;
    echo $err->getMessage();
    exit;
}

$errflg = false;
$isSubmit = false;

if (isset($_POST[USER_PAGE_SUBMIT])) {
    $isSubmit = true;

    if (!empty($_POST['teachers']) && !empty($_POST['days']) && !empty($_POST['subjects']) && !empty($_POST['period'])) {

        $teachers = $_POST['teachers'];
        $days = $_POST['days'];
        $select = $_POST['subjects'];
        $period = $_POST['period'];
        $sql = 'UPDATE t_users SET teachers=:teachers, subjects=:subjects WHERE days=:days AND period=:period';

        $reg_param = array();
        $reg_param[':teachers'] = $teachers;
        $reg_param[':days'] = $days;
        $reg_param[':subjects'] = implode(',', $select);
        $reg_param[':period'] = $period;

        try {
            $pdo = create_pdo();
            $users = pdo_insert($pdo, $sql, $reg_param);
            $pdo = null;
        } catch (Exception $ex) {
            $pdo = null;
            echo $ex->getMessage();
            exit;
        }
    } else {
        $errflg = true;
    }
}


?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>PDO課題0 - USER</title>
        <meta charset="UTF-8">
        <style>
            body {
                font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, sans-serif;
                fontsize:14px;
            }
            ul li {
                display: inline;
            }
        </style>
    </head>
    <body>
        <h2>○×塾　時間割登録</h2>
        <?php
            if ($isSubmit == true && $errflg == false ) {
        ?>
        <p><?=MSG_REGIST_OK?></p>
        <a href="pdo-main.php">トップへ戻る</a>
        <?php
            } else {
                if ($errflg == true) {
                    echo '<p>'.MSG_INPUT_ERR.'</p>';
                } else {
                    echo '<p>全て必須項目です。</p>';
                }
        ?>
        <form action="pdo-user.php" method="post">
            <table>
                <tr>
                    <td>
                        講師名：
                    </td>
                    <td>
                        <?php
                            if (!empty($teachers)) {
                                $select = array();
                                if (isset($_POST['teachers'])) {
                                    $select = $_POST['teachers'];
                                }
                                $check = '';
                                foreach($teachers as $val) {
                                    if (in_array($val['id'], $select)) { $check = 'checked'; } else { $check = ''; }

                                    echo '<input type="checkbox" name="teachers" value="'.$val['id'].'"'.$check.'>'.$val['teacherName'].'<br>';
                                }
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                  <td>
                    科目：
                  </td>
                  <td>
                    <?php
                    if (!empty($subjects)) {
                      $select = array();
                      if (isset($_POST['subjects'])) {
                        $select = $_POST['subjects'];
                      }
                      $check = '';
                      foreach($subjects as $val) {
                        if (in_array($val['id'], $select)) { $check = 'checked'; } else { $check = ''; }

                        echo '<input type="checkbox" name="subjects[]" value="'.$val['id'].'"'.$check.'>'.$val['subjectName'].'<br>';
                      }
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                    <td>
                        曜日：
                    </td>
                    <td>
                        <input type="text" name="days" value="<?php if ($isSubmit == true && !empty($_POST['days'])) { echo $_POST['days']; } ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        時限：
                    </td>
                    <td>
                        <input type="text" name="period" value="<?php if ($isSubmit == true && !empty($_POST['period'])) { echo $_POST['period']; } ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="<?=USER_PAGE_SUBMIT?>" value="登録">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            }
        ?>
    </body>
</html>
