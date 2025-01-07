<?php
    function restaurantJoin($restaurant_id, $rpw, $r_name, $p_num, $category, $seatType) {
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "INSERT INTO restaurant (restaurant_id, rpw, r_name, p_num, category, seatType) VALUES ('$restaurant_id', '$rpw', '$r_name', '$p_num', '$category', $seatType);";
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