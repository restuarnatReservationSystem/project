<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
    <link href="./css/main.css" rel="stylesheet" type="text/css" />
    <link href="./css/header.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header class="header">
        <div class="header-left">
            <h1 class="title">제목</h1>
        </div>
        <div class="header-center">
            <input type="text" class="search-bar" placeholder="검색...">
        </div>
        <nav class="header-right">
            <a href="#" class="nav-item">마이페이지</a>
            <?php
                session_start(); // 세션 시작
                // 세션에 'uid'가 설정되어 있다면 "로그아웃" 링크 출력, 아니라면 "로그인" 링크 출력
                echo isset($_SESSION['uid']) ? 
                     '<a href="../login/logout_process.php" class="nav-item">로그아웃</a>' : 
                     '<a href="../login/login.html" class="nav-item">로그인</a>';
            ?>
            
        </nav>
    </header>

    <section class="category-section">
        <h2 class="category-title">카테고리</h2>
        <div class="categories">
            <a href="#" class="category-item" onclick="loadCategory(null)">전체</a>
            <a href="#" class="category-item" onclick="loadCategory('korean')">한식</a>
            <a href="#" class="category-item" onclick="loadCategory('west')">양식</a>
            <a href="#" class="category-item" onclick="loadCategory('chinese')">중식</a>
        </div>
    </section>

    <main class="main-content" id="restaurant-list">
        <?php
            include('../../model/postProcess.php');
            include('../../model/model.php');

            $model = new Model();
            $category = isset($_GET['category']) ? $_GET['category'] : null;

            $result = postList($category);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = $model->fetch($result)) {
                    echo '<a href="../restaurantInfoPage/restaurantInfoPage.php?r_name=' . $row['r_name'] . '" class="restaurant-link" style="color: black; text-decoration: none;" onmouseover="this.style.textDecoration=\'underline\'" 
                    onmouseout="this.style.textDecoration=\'none\'">';
                    echo "<div class='restaurant-box'>";
                    echo '<div class="restaurant-info">';
                    echo "<h3>" . $row['r_name'] . "</h3>";
                    echo "<p>전화번호: " . $row['p_num'] . "</p>";
                    echo '</div></div>';
                    echo '</a>';                }
            } else {
                echo "<p>해당 카테고리에 대한 식당 정보가 없습니다.</p>";
            }
        ?>
    </main>

    <script>
        function loadCategory(category) {
            if (category === null) {
                window.location.href = window.location.pathname;
            } else {
                window.location.href = "?category=" + category;  
            }
        }
    </script>
</body>

</html>
