<?php
    function postList($category){
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
            return $result;
        } else {
            return false;
        }
    }

    function post($r_name){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "SELECT r.*, p.* FROM post p JOIN restaurant r ON p.restaurant_id = r.restaurant_id WHERE r.r_name = '$r_name';";
        $result = $model->query($query);
        $row = $model->fetch($result);
        if($result && mysqli_num_rows($result) != 0){
            
            return $row;
        } else {
            echo "false";
            return false;
        }
    }

    function createPost($restaurant_id){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "INSERT INTO post (restaurant_id) VALUES ('$restaurant_id')";
        $result = $model->query($query);
        
        if ($result) {
            $model->close();
            return true;
        } else {
            $model->close();
            return false;
        }
    }
?>