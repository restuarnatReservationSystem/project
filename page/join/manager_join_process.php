<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>회원 가입 시스템</title>
        <link href="../join/join_process.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <?php
        $restaurant_id = $_POST['rid'];
        $rpw = $_POST['rpw'];
        $p_num = $_POST['p_num'];
        $r_name = $_POST['r_name'];
        $category = $_POST['category'];
        $seatType = $_POST['seatType'];


        if (empty($restaurant_id) || empty($rpw) || empty($p_num) || empty($r_name) || empty($category) || empty($seatType)) {
            echo "<div id='main'>";
            echo "<div id='header'>";
            echo "<h1>모든 입력값을 입력해주세요.</h1>";
            echo "<h2>1초 후 회원가입 페이지로 이동합니다.</h2>";
            header("Refresh: 1; url='../join/manager_join.html'");
            echo "</div>";
            echo "</div>";
        } else {
            include('../../model/restaurantJoin.php');
            include('../../model/postProcess.php');
            include('../../model/seat.php');
            
            $result = restaurantJoin($restaurant_id, $rpw, $r_name, $p_num, $category, $seatType);
            createPost($restaurant_id);
            createseat($r_name, $seatType);
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
                header("Refresh: 1; url='../join/manager_join.html'");
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </body>
</html>