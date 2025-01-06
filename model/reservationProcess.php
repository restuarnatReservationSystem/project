<?php
    function createReservation($user_id, $seat_id){
        require_once ('model.php')

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
        require_once ('./model.php')

        $model = new Model();
        $model->open();

        $query = "DELETE reservation where user_id = '$user_id' && seat_id = '$seat_id' && reservation_end = 'false';";
        $result = $model->query($query);

        if($result){
            return "delete reservation"
        } else {
            return "no data"
        }
    }

    function checkReservation($user_id, $user_pw){
        require_once ('./model.php')

        $model = new Model();
        $model->open();

        $query = "SELECT * from reservation where user_id = '$user_id' order by reservation_time desc;";
        $result = $model->query($query);

        if(isset($result)){
            $model->close();
            return $result;
        } else {
            $model->close();
            return "no data"
        }
    }
?>