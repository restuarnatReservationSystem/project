<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./restaurantInfoPage.css" />
    <title>Document</title>
    <style>
        .menuBar {
            display: flex;
            justify-content: flex-end;
            margin-right: 20px;
            gap: 10px;
        }

        .reviewBox {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: stretch;
            width: 1100px;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        .reviewContent {
            flex: 1;
            overflow-y: auto;
            margin-bottom: 10px;
            padding: 10px;
        }

        .review {
            width: 90%;
            margin: 10px auto;
            padding: 15px;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .review:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .review strong {
            font-size: 16px;
            color: #333;
        }

        .review p {
            margin: 10px 0;
            color: #555;
        }

        .review small {
            font-size: 12px;
            color: #777;
        }

        .reviewForm {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .reviewForm textarea {
            width: 98%;
            height: 80px; /* 높이 조정 */
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: none;
        }

        .reviewForm button {
            width: 100px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            align-self: flex-end;
        }

        .reviewForm button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none; 
            color: black;         
        }
    </style>
</head>

<body>
    <div class='container'>
        <div class='header'>
            <?php
            session_start();
            $r_name = $_GET['r_name'];
            echo "<h2>" . $r_name . "</h2>";
            echo isset($_SESSION['uid']) ? 
            '<a href="../myPage/myPage.php" class="nav-item">마이페이지</a>&nbsp<a href="../login/logout_process.php" class="nav-item">로그아웃</a>' : 
            '<a href="../login/login.html" class="nav-item">로그인</a>';
            ?>
        </div>
        <div class="banner">
            <?php
            include('../../model/postProcess.php');

            $result = post($r_name);
            echo "<img src='{$result['postimg']}' style='height:400px; width:100%; object-fit:cover; border-radius:20px;'>";
            ?>
        </div>
        <div style='display: flex; flex-direction:column;'>
            <div class='menuBar'>
                <a href="../reservation/reservation<?php echo urlencode($result['seatType']) ?>.html?r_name=<?php echo urlencode($r_name); ?>">좌석</a>
                <button name='Review' style='width:100px;'>리뷰</button>
                <button name='Menu' style='width:100px;'>메뉴</button>
                <button name='Info' style='width:100px;'>정보</button>
            </div>
            <div class='reviewBox'>
                <div class='reviewContent'>
                    <?php
                    include('../../model/review.php');
                    include('../../model/review.php');

                    $model = new Model();

                    $results = readReview($result['post_id']);
                    if ($results) {
                        foreach ($results as $review) {
                            echo "<div class='review'>";
                            echo "<strong>" . htmlspecialchars($review['user_id']) . "</strong>";
                            echo "<p>" . nl2br(htmlspecialchars($review['review'])) . "</p>";
                            echo "<p>평점: " . htmlspecialchars($review['review_point']);
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='review'>";
                        echo "<p>등록된 리뷰가 없습니다.</p>";
                        echo "</div>";
                    }
                
                    ?>
                </div>
                <form class="reviewForm" method="POST" action="reviewProcess.php">
                    <input type="text" name="r_name" value="<?php echo $r_name; ?>" readonly>
                    <textarea name="reviewContent" placeholder="리뷰를 입력하세요..."></textarea>
                    <!-- 평점 입력 -->
                    <label for="reviewPoint">평점:</label>
                    <select name="reviewPoint" id="reviewPoint">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <button type="submit">등록</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
