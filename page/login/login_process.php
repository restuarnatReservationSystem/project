<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>로그인 시스템</title>
    </head>
    <body>
        <?php
            $uid = $_POST['uid'];
            $upw = $_POST['upw'];

            include('../../model/userLoginProcess.php');

            $result = userLoginProcess($uid, $upw);

            if ($result) {
                echo "로그인 성공! 환영합니다.";
                echo "<br>3초 후 가게 페이지로 이동합니다.<br>";
                header("Refresh: 1; url=../main/main.html");
            } else {
                echo "아이디 또는 비밀번호가 틀렸습니다. 다시 시도해주세요.";
                echo "<br>3초 후 로그인 페이지로 이동합니다.<br>";
                header("Refresh: 1; url=login.html");
            }
        ?>
    </body>
</html>