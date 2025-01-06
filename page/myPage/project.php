<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>마이페이지</title>
    <link rel="stylesheet" href="project.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>마이페이지</h1>
        </div>
        <div class="profile">
            <img src="기본 프로필.png" alt="Profile Image">
            <div class="info">
                <?php
                    session_start();
                    echo $_SESSION['nickname'];
                ?>
            </div>
        </div>
        <ul class="menu">
            <li><a href="#">예약 현황</a></li>
            
            <li><a href="#">로그아웃</a></li>
        </ul>
    </div>
</body>
</html>
