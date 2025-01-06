<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf8'>
    </head>
    
    <body>
        <?php
            header('Content-Type: text/html; charset=UTF-8');
            include('../../model/categoryProcess.php');
            include('../../model/model.php');

            $model = new Model();
            $result = category('한식');

            if ($result) {
                while ($row = $model->fetch($result)) {
                    echo "<div class='restaurant-item'>";
                    echo "<h3>" . $row['r_name'] . "</h3>";  
                    echo "<p>전화번호: " . $row['p_num'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>해당 카테고리에 대한 식당 정보가 없습니다.</p>";
            }
        ?>
    </body>

</html>