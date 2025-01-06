<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_db";

// DB 연결 (절차 지향 방식)
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 연결 확인
if (!$conn) {
    die("DB 연결 실패: " . mysqli_connect_error());
}

// GET 요청에서 카테고리 가져오기
$category = isset($_GET['category']) ? $_GET['category'] : '';

$sql = "SELECT * FROM restaurants WHERE category = '$category'";
$result = mysqli_query($conn, $sql);

// 식당 목록 출력
echo "<h2>" . htmlspecialchars($category) . " 식당 목록</h2>";
echo '<div class="restaurant-container">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="restaurant-box">';
    echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '" class="restaurant-image">';
    echo '<div class="restaurant-info">';
    echo '<h3>' . $row['name'] . '</h3>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<p>평점: ' . $row['rating'] . '</p>';
    echo '</div></div>';
}
echo '</div>';

// 결과 및 연결 종료
mysqli_free_result($result);
mysqli_close($conn);
?>
