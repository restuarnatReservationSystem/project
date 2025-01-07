<?php
        function searchRestaurant($search){
            require_once ('model.php');
    
            $model = new Model();
            $model->open();
    
            $query = "SELECT * from restaurant where r_name = '%$search%';";
            $result = $model->query($query);
    
            if($result && mysqli_num_rows($result) != 0){
                $model->close();
                return $result;
            } else {
                $model->close();
                return false;
            }
        }
?>