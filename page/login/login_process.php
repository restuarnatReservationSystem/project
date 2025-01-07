<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>로그인 시스템</title>
        <link href="../login/login_process.css" rel="stylesheet" type="text/css" />
    </head>
    <body>  
    </body>
        <?php
            $uid = $_POST['uid'];
            $upw = $_POST['upw'];
            $user = $_POST['user'];
            if($user == 'user') {
                include('../../model/userLoginProcess.php');
                $result = userLoginProcess($uid, $upw);
            } else {
                include('../../model/restaurantLoginProcess.php');
                $result = restaurantLoginProcess($uid, $upw);
            }
            

            if ($result) {
                echo "<div id='main'>";
                echo "<div id='header'>";
                echo "<h1>".$_SESSION['nickname']."님 환영합니다."."</h1>";
                echo "<h2>3초 후 가게 페이지로 이동합니다.</h2>";
                header("Refresh: 1; url='../main/main.php'");
                echo "</div>";
                echo "</div>";
                
            } else {
                echo "<div id='main'>";
                echo "<div id='header'>";
                echo "<h2>아이디 또는 비밀번호가 틀렸습니다. 다시 시도해주세요.</h2>";
                echo "<h2>3초 후 로그인 페이지로 이동합니다.</h2>";
                echo "</div>";
                echo "</div>";
                header("Refresh: 1; url='./login.html'");
            }
        ?>
    </body>
</html>