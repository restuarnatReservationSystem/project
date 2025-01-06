<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>로그인 시스템</title>
    </head>
    <body>
        <?php
        $rid = $_POST['rid'];
        $rpw = $_POST['rpw'];

        include '../model/restaurantLoginProcess.php';

        restaurantLoginProcess($rid, $rpw);
        ?>
    </body>
</html>