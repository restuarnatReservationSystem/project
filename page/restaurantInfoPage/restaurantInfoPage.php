<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./main.css">
    <style>
        /* 기본적인 페이지 설정 */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
            min-width: 1024px;
            /* 최소 너비 설정 */
            min-height: 768px;
            /* 최소 높이 설정 */
        }
    </style>
</head>

<body>
    <!-- <header class="header">
        <div class="header-left">
            <img src="/pj/image/logo.jpg" alt="로고" class="logo">
            <h1 class="title">제목</h1>
        </div>
        <div class="header-center">
            <h1 class="title">식당이름</h1>
        </div>
        <nav class="header-right">
            <a href="#" class="nav-item">마이페이지</a>
            <a href="#" class="nav-item">로그인/로그아웃</a>
        </nav>
    </header> -->
    <?php include 'header.php'; ?>

    <main class="main-content">
        <div class="restaurant-box">
            <img src="restaurant.jpg" alt="식당 이미지" class="restaurant-image">
            <img src="restaurant.jpg" alt="식당 이미지" class="restaurant-image">
        </div>
        <div>
            <button class="btn" onclick="">리뷰</button>
            <button class="btn"><a href="https://www.daum.net/" target="_blank">좌석</a></button>
            <button class="btn"><a href="https://www.google.com/" target="_blank">예약</a></button>
        </div>
    </main>
    <?php include 'Review.php';?>
    <footer>
        <p>footer</p>45656
    </footer>
</body>

</html>