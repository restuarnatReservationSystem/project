<?php
session_start(); // 세션은 PHP 블록 상단에서 시작합니다.
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>마이페이지</title>
    <link rel="stylesheet" href="./mypage.css">
    <style>
        .hidden {
            display: none;
        }
        .block {
            display: block;
        }
        /* 메뉴 항목이 사라지지 않도록 스타일 추가 */
        ul.menu {
            list-style-type: none;
            padding: 0;
        }
        ul.menu li {
            margin: 10px 0;
        }
        ul.menu a {
            text-decoration: none;
            color: #333;
        }
        /* 버튼 스타일링 */
        button {
            background: none; /* 기본 배경 제거 */
            border: none; /* 테두리 제거 */
            color: #333; /* 글씨 색상 */
            font-size: 16px; /* 글씨 크기 */
            cursor: pointer; /* 마우스 포인터 */
        }
        button:focus {
            outline: none; /* 포커스 시 기본 outline 제거 */
        }
    </style>
    <script>
        function blockDisplay() {
            const details = document.getElementById('reservationDetails');
            if (details.classList.contains('hidden')) {
                details.classList.remove('hidden');
                details.classList.add('block');
            } else {
                details.classList.remove('block');
                details.classList.add('hidden');
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>마이페이지</h1>
        </div>
        <div class="profile">
            <div class="info">
                <?php
                    echo "<h2>" . $_SESSION['nickname'] . "님</h2>";
                ?>
            </div>
        </div>
        <ul class="menu">
            <li>
            <a href="#" onclick='blockDisplay()'>예약 현황</a>
            </li>
            <li><a href="../login/logout_process.php">로그아웃</a></li>
            <div id="reservationDetails" class="hidden">
                <h1>예약 현황</h1>
                <?php
                    include('../../model/reservationProcess.php');
                    require_once('../../model/model.php');

                    $model = new Model();
                    $model->open();
                    $reservation = checkReservation($_SESSION['uid']);
                    if ($reservation) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>예약자 이름</th>";
                        echo "<th>식당</th>";
                        echo "<th>자리번호</th>";
                        echo "<th>예약시간</th>";
                        echo "<th>종료여부</th>";
                        echo "</tr>";
                        while ($row = $model->fetch($result)) {
                            echo "<tr>";
                            echo "<td>" . $_SESSION["nickname"] . "</td>";
                            echo "<td>" . $row['r_name'] . "</td>";
                            echo "<td>" . $row['reservation_time'] . "</td>";
                            echo "<td>" . ($row['reservation_end'] ? '종료' : '예약중') . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "현재 예약이 없습니다.";
                    }
                ?>
            </div>
            
        </ul>
    </div>
</body>
</html>
