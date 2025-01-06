<?php
    function createReservation($user_id, $seat_id){
        require_once './model.php';

        $model = new Model();
        $model->open();

        $query = "INSERT INTO reservation ('user_id, seat_id') values ('$user_id', '$seat_id');";
        $result = $model->query($query);

        if($result){
            return "ok";
        } else {
            return mysqli_error($model->dbconn);
        }
    }

    function removeReservation($user_id, $seat_id){
        require_once './model.php';

        $model = new Model();
        $model->open();

        $query = "DELETE reservation"
    }
?>