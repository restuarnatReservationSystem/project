<?php

function initializeSeatTypeTable() {
    require_once('model.php');

    $model = new Model();
    $model->open();

    try {
        $query = "SELECT COUNT(*) as count FROM seatType";
        $result = $model->query($query);
        $row = $model->fetch($result);

        if ($row['count'] == 0) {
            $seatTypes = ['좌석 타입1', '좌석 타입2', '좌석 타입3', '좌석 타입4'];

            $dbconn = $model->getDbConnection();
            $insertQuery = "INSERT INTO seatType (seatType_name) VALUES (?)";
            $stmt = mysqli_prepare($dbconn, $insertQuery);

            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . mysqli_error($dbconn));
            }
            foreach ($seatTypes as $seatTypeName) {
                mysqli_stmt_bind_param($stmt, "s", $seatTypeName);
                $result = mysqli_stmt_execute($stmt);

                if (!$result) {
                    throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
                }
            }

            mysqli_stmt_close($stmt);
        }

        $model->close();
        return true;
    } catch (Exception $e) {
        error_log("Error in initializeSeatTypeTable: " . $e->getMessage());
        $model->close();
        return false;
    }
}

function restaurantJoin($restaurant_id, $rpw, $r_name, $p_num, $category, $seatType) {
    require_once('model.php');


    initializeSeatTypeTable();

    $model = new Model();
    $model->open();

    // NULL 값 처리
    $p_num = empty($p_num) ? null : $p_num;

    try {
        // 데이터베이스 연결 객체 가져오기
        $dbconn = $model->getDbConnection();

        // Prepared Statement 생성
        $query = "INSERT INTO restaurant (restaurant_id, rpw, r_name, p_num, category, seatType) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($dbconn, $query);

        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . mysqli_error($dbconn));
        }

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssssi", $restaurant_id, $rpw, $r_name, $p_num, $category, $seatType);

        // 실행
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
        }

        // Prepared Statement 닫기
        mysqli_stmt_close($stmt);

        $model->close();
        return true;
    } catch (Exception $e) {
        // 에러 로그 기록
        error_log("Error in restaurantJoin: " . $e->getMessage());
        $model->close();
        return false;
    }
}
?>