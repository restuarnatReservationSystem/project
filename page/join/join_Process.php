<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>회원 가입 시스템</title>
        <link href="./join_process.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        $uid = $_POST['uid'];
        $upw = $_POST['upw'];
        $nickname = $_POST['nickname'];
        $p_num = $_POST['p_num'];


        if (empty($uid) || empty($upw) || empty($nickname) || empty($p_num)) {
            echo "<div id='main'>";
            echo "<div id='header'>";
            echo "<h1>모든 입력값을 입력해주세요.</h1>";
            echo "<h2>1초 후 회원가입 페이지로 이동합니다.</h2>";
            header("Refresh: 1; url='../join/join.html'");
            echo "</div>";
            echo "</div>";
        } else {
            include('../../model/userJoin.php');
            $result = userJoin($uid, $upw, $nickname, $p_num);

            if ($result) {
                echo "<div id='main'>";
                echo "<div id='header'>";
                echo "<h1>회원가입이 완료되었습니다.</h1>";
                echo "<h2>1초 후 로그인 페이지로 이동합니다.</h2>";
                header("Refresh: 1; url='../login/login.html'");
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div id='main'>";
                echo "<div id='header'>";
                echo "<h1>회원가입이 실패했습니다.</h1>";
                echo "<h2>1초 후 회원가입 페이지로 이동합니다.</h2>";
                header("Refresh: 1; url='../join/join.html'");
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </body>
</html>