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
        }
        #seat-two, #seat-four {
            text-align: center;
        }
        .seat_2, .seat_4 {
            width: 100px;
            height: 150px;
            margin: 20px;
            border: 2px solid lightgray;
        }
        .reserved {
            background-color: lightgray;
            color: white;
            cursor: not-allowed;
        }
        .cancel-button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: crimson;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .cancel-button:hover {
            background-color: darkred;
        }
        button:focus {
            border-color: black;
            outline: none;
        }
        #seat div {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>좌석 예약 시스템</h1>
    </div>
    <div id="main">
        <form id="seat-form" method="POST">
            <div id="seat">
                <div id="seat-two">
                    <?php
                    $conn = new mysqli("localhost", "root", "password", "SeatReservation");
                    if ($conn->connect_error) {
                        die("Database connection failed: " . $conn->connect_error);
                    }

                    $seats = ["1", "2", "3", "4"];
                    $reservedSeats = [];
                    $result = $conn->query("SELECT seat_name FROM reservations");
                    while ($row = $result->fetch_assoc()) {
                        $reservedSeats[] = $row["seat_name"];
                    }

                    foreach ($seats as $seat) {
                        $isReserved = in_array($seat, $reservedSeats);
                        $class = $isReserved ? "seat_2 reserved" : "seat_2";
                        $disabled = $isReserved ? "disabled" : "";
                        echo "<div>";
                        echo "<button type='submit' name='seat' value='$seat' class='$class' $disabled>$seat<br>(2인석)</button>";
                        if ($isReserved) {
                            echo "<button type='submit' name='cancel' value='$seat' class='cancel-button'>취소</button>";
                        }
                        echo "</div>";
                    }
                    ?>
                </div>
                <div id="seat-four">
                    <?php
                    $seatsFour = ["5", "6", "7", "8"];
                    foreach ($seatsFour as $seat) {
                        $isReserved = in_array($seat, $reservedSeats);
                        $class = $isReserved ? "seat_4 reserved" : "seat_4";
                        $disabled = $isReserved ? "disabled" : "";
                        echo "<div>";
                        echo "<button type='submit' name='seat' value='$seat' class='$class' $disabled>$seat<br>(4인석)</button>";
                        if ($isReserved) {
                            echo "<button type='submit' name='cancel' value='$seat' class='cancel-button'>취소</button>";
                        }
                        echo "</div>";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["seat"])) {
        $seat = htmlspecialchars($_POST["seat"]);
        $conn = new mysqli("localhost", "root", "password", "SeatReservation");
        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("INSERT INTO reservations (seat_name) VALUES (?)");
        $stmt->bind_param("s", $seat);

        if ($stmt->execute()) {
            echo "<script>alert('$seat 예약이 완료되었습니다!');</script>";
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit();
        }
        $stmt->close();
        $conn->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cancel"])) {
        $seat = htmlspecialchars($_POST["cancel"]);
        $conn = new mysqli("localhost", "root", "password", "SeatReservation");
        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("DELETE FROM reservations WHERE seat_name = ?");
        $stmt->bind_param("s", $seat);

        if ($stmt->execute()) {
            echo "<script>alert('$seat 예약이 취소되었습니다!');</script>";
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit();
        }
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
