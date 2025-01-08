<?php
    function userJoin($uid, $upw, $nickname, $p_num) {
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "INSERT INTO customer (customer_id, upw, nickname, p_num) VALUES ('$uid', '$upw', '$nickname', '$p_num')";
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
