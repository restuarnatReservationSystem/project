<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>회원 가입 시스템</title>
    </head>
    <body>
        <?php
        $uid = $_POST['uid'];
        $upw = $_POST['upw'];
        $nickname = $_POST['nickname'];
        $p_num = $_POST['p_num'];

        include 'model\userJoin.php';

        userJoin($uid, $upw, $nickname, $p_num);
        ?>
    </body>
</html>