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
    <title>좌석 예약 시스템</title>
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
            width: 1000px;
            height: 500px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: white;
            position: relative;
            padding: 20px;
        }
        .seat_2, .seat_4 {
            margin: 20px;
            border: 2px solid lightgray;
        }
        .seat_2 {
            width: 100px;
            height: 150px;
        }
        .seat_4 {
            width: 150px;
            height: 150px;
        }
        button:focus {
            border-color: black;
            outline: none;
        }
        #door {
            position: absolute;
            background-color: #AA8319;
            top: 100px;
            right: 50px;
            width: 30px;
            height: 70px;
            border: none;
        }
        #window {
            position: absolute;
            background-color: #B2EBF4;
            top: 80px;
            left: 50px;
            width: 30px;
            height: 350px;
            border: none;
        }
        #reserve-section {
            margin-top: 20px;
            text-align: right;
            width: 100%;
        }
        #reserve-button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: cadetblue;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        #reserve-button:hover {
            background-color: rgb(72, 167, 170);
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>좌석 예약 시스템</h1>
    </div>
    <div id="main">
        <form id="seat-form" method="POST" action="reservation_session2.php">
            <div id="seat">
                <div class="seat-24">
                    <button type="button" class="seat_2" onclick="selectSeat('1번 테이블')">1번 테이블<br>(2인석)</button>
                    <button type="button" class="seat_2" onclick="selectSeat('2번 테이블')">2번 테이블<br>(2인석)</button>
                    <button type="button" class="seat_4" onclick="selectSeat('5번 테이블')">5번 테이블<br>(4인석)</button>
                    <button type="button" class="seat_4" onclick="selectSeat('6번 테이블')">6번 테이블<br>(4인석)</button>
                </div>
                <div class="seat-24">
                    <button type="button" class="seat_2" onclick="selectSeat('3번 테이블')">3번 테이블<br>(2인석)</button>
                    <button type="button" class="seat_2" onclick="selectSeat('4번 테이블')">4번 테이블<br>(2인석)</button>
                    <button type="button" class="seat_4" onclick="selectSeat('7번 테이블')">7번 테이블<br>(4인석)</button>
                    <button type="button" class="seat_4" onclick="selectSeat('8번 테이블')">8번 테이블<br>(4인석)</button>
                </div>
            </div>
            <div id="reserve-section">
                <input type="hidden" id="selected-seat" name="seat" value="">
                <button id="reserve-button" type="submit">예약하기</button>
            </div>
        </form>
        <button id="door">문</button>
        <button id="window">창문</button>
    </div>
    <script>
        function selectSeat(seat) {
            document.getElementById('selected-seat').value = seat;
            alert(seat + "을 선택하셨습니다!");
        }
    </script>
</body>
</html>
