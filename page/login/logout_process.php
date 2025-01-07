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
            session_start();
            session_unset();

            echo "<div id='main'>";
            echo "<div id='header'>";
            echo "<h2>로그아웃되었습니다</h2>";
            echo "</div>";
            echo "</div>";
            header("Refresh: 1; url='../main/main.php'");

        ?>
    </body>
</html>