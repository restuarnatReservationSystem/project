<?php
        function createReservation($search){
            require_once ('model.php');
    
            $model = new Model();
            $model->open();
    
            $query = "SELECT * from reservation where user_id = '$user_id';";
            $result = $model->query($query);
    
            if($result){
                $model->close();
                return "ok";
            } else {
                $model->close();
                return mysqli_error($model->dbconn);
            }
        }
?>