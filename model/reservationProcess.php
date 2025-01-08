<?php
    function createReservation($user_id, $seat_id){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "INSERT INTO reservation ('customer_id, seat_id') values ('$user_id', '$seat_id');";
        $result = $model->query($query);

        if($result){
            return true;
        } else {
            return false;
        }
    }

    function removeReservation($user_id, $seat_id){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "DELETE reservation where customer_id = '$user_id' && seat_id = '$seat_id' && reservation_end = 'false';";
        $result = $model->query($query);

        if($result){
            return true;
        } else {
            return false;
        }
    }

    function checkReservation($user_id){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "SELECT r.customer_id, r.reservation_time, r.reservation_end, s.r_name, s.s_index
                    FROM reservation r
                    JOIN seat s ON r.seat_id = s.seat_id
                    WHERE r.customer_id = $user_id
                    ORDER BY r.reservation_time DESC;";
        $result = $model->query($query);

        if($result && $result->num_rows > 0){
            $model->close();
            return $result;
        } else {
            $model->close();
            return false;
        }
    }
?>