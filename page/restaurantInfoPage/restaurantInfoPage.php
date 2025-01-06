<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./restaurantInfoPage.css" />
        <title>Document</title>
    </head>
    <body>
        <div class='header'>
        <?php
            $r_name = $_GET['r_name'];
            echo "<h2>".$r_name."</h2>";
            echo isset($_SESSION['uid']) ?  '': "<a href='../login/login.html'>로그인</a>";
        ?>
        </div>
        <div class="banner">
            <?php
                include('../../model/postProcess.php');

                $result = post($r_name);
                echo "<img src='{$result['postimg']}' style='height:400px; width:100%; object-fit:cover;'>";
            ?>
        </div>
        <a href="../reservation/reservation<?php echo urlencode($result['seatType'])?>.html?r_name=<?php echo urlencode($r_name); ?>">이동</a>

    </body>

</html>