<?php
    function userLoginProcess($rid, $rpw){
        require_once './model.php';

        $model = new Model();
        $model->open();

        $query = "SELECT * FROM restaurant WHERE restaurant = '$rid' && rpw = '$rpw';";
        $result = $model->query($query);
        $restaurant = $model->fetch($result);

        if($user){
            session_start();
            $_SESSION['restaurant_id'] = $restaurant['restaurant_id'];
            $_SESSION['r_name'] = $restaurant['r_name'];
            $_SESSION['p_num'] = $restaurant['p_num'];
            $_SESSION['time'] = time();


            $model->close();
            return null;

        }else{
            $model->close()
            return null;
        }
    }
?>
