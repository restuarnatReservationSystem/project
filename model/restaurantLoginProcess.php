<?php
    function restaurantLoginProcess($rid, $rpw){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "SELECT * FROM restaurant WHERE restaurant_id = '$rid' && rpw = '$rpw';";
        $result = $model->query($query);
        $restaurant = $model->fetch($result);

        if($restaurant){
            session_start();
            $_SESSION['uid'] = $restaurant['restaurant_id'];
            $_SESSION['nickname'] = $restaurant['r_name'];
            $_SESSION['time'] = time();


            $model->close();
            return true;

        }else{
            $model->close();
            return false;
        }
    }
?>