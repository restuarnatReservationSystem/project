<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="../main/css/header.css" rel="stylesheet" type="text/css" />
        <link href="../main/css/main.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header class="header">
            <div class="header-left">
            <a href='../main/main.php' style='text-decoration: none; color: black'><h1 class="title">제목</h1></a>
            </div>
            <form action='../search/search.php' method='get' class="header-center">
                <input type="text" class="search-bar" placeholder="검색..." name='search'>
                <button type="submit" style='background:none; border: none; padding: 0; cursor:pointer;'><img src="../main/search.png" style="width: 40px;"></button>
            </form>
            <nav class="header-right">
                <a href="../myPage/myPage.php" class="nav-item">마이페이지</a>
                <?php
                    session_start(); // 세션 시작
                    // 세션에 'uid'가 설정되어 있다면 "로그아웃" 링크 출력, 아니라면 "로그인" 링크 출력
                    echo isset($_SESSION['uid']) ? 
                        '<a href="../myPage/myPage.php" class="nav-item">마이페이지</a><a href="../login/logout_process.php" class="nav-item">로그아웃</a>' : 
                        '<a href="../login/login.html" class="nav-item">로그인</a>';
                ?>
                </nav>
        </header>
        <main class="main-content" id="restaurant-list">
            <?php
                $search = $_GET['search'];
      
                include('../../model/searchRestaurant.php');
                $result = searchRestaurant($search);
    
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
                    echo "<p>검색어 $search 에 대한 식당 정보가 없습니다.</p>";
                }
            ?>
        </main>
    </body>
</html>