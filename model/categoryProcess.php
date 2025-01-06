<?php
    function post($category){
        require_once ('model.php');

        $model = new Model();
        $model->open();
        if($category){
            $query = "SELECT r.r_name, r.p_num, r.category, p.* FROM post p JOIN restaurant r ON p.restaurant_id = r.restaurant_id WHERE r.category = '$category';";
        } else {
            $query = "SELECT r.r_name, r.p_num, r.category, p.* FROM post p JOIN restaurant r ON p.restaurant_id = r.restaurant_id;";
        }
        
        $result = $model->query($query);

        if($result && mysqli_num_rows($result) != 0){
            echo "true";
            return $result;
        } else {
            echo "false";
            return false;
        }
    }
?>