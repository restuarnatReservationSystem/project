<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["seat"])) {
    $_SESSION['selected_seat'] = htmlspecialchars($_POST["seat"]);
    $selected_seat = $_SESSION['selected_seat'];
} else {
    $selected_seat = "선택된 좌석이 없습니다.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>좌석 예약 확인</title>
    <style>
        body {
            width: auto;
            height: auto;
            display: flex;
            flex-direction: column; 
            align-items: center; 
            justify-content: center;
            background-color: antiquewhite; 
        }
        #main {
            display: flex;
            align-items: center;
            flex-direction: column; 
            justify-content: center;
            width: 500px;
            height: 300px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: white;
            position: relative;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
        }
        #back-button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: cadetblue;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #back-button:hover {
            background-color: rgb(72, 167, 170);
        }
    </style>
</head>
<body>
    <div id="main">
        <h1>좌석 예약 확인</h1>
        <p>선택한 좌석: <strong><?php echo $selected_seat; ?></strong> 예약되었습니다</p>
        <form action="../main/main.php">
            <button id="back-button">뒤로가기</button>
        </form>
    </div>
</body>
</html>
