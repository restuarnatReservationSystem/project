<?php
        function searchRestaurant($search){
            require_once ('model.php');
    
            $model = new Model();
            $model->open();
    
            $query = "SELECT * from restaurant where r_name = '%$search%';";
            $result = $model->query($query);
    
            if($result){
                $model->close();
                return $result;
            } else {
                $model->close();
                return mysqli_error($model->dbconn);
            }
        }
?>