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
            <a href="#" class="nav-item">로그인/로그아웃</a>
        </nav>
    </header>

    <section class="category-section">
        <div class="categories">
            <button class="category-item" onclick="loadCategory(null)">전체</button>
            <button class="category-item" onclick="loadCategory('한식')">한식</button>
            <button class="category-item" onclick="loadCategory('양식')">양식</button>
            <button class="category-item" onclick="loadCategory('중식')">중식</button>
        </div> <!-- 버튼 UI 수정정-->
    </section>

    <main class="main-content" id="restaurant-list">
        <?php
            include('../../model/categoryProcess.php');
            include('../../model/model.php');

            $model = new Model();
            $category = isset($_GET['category']) ? $_GET['category'] : null;

            $result = post($category);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = $model->fetch($result)) {
                    echo "<div class='restaurant-item'>";
                    echo "<h3>" . $row['r_name'] . "</h3>";
                    echo "<p>전화번호: " . $row['p_num'] . "</p>";
                    echo "</div>"; // ui 생성
                }
            } else {
                echo "<p>해당 카테고리에 대한 식당 정보가 없습니다.</p>";
            }
        ?>
    </main>

    <script>
        // 카테고리 클릭 시 해당 카테고리를 GET 방식으로 전달하는 함수
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
