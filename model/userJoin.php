<?php
    function userJoin($uid, $upw, $nickname, $p_num) {
        require_once './model.php';

        $model = new Model();
        $model->open();

        $query = "INSERT INTO user (user_id, upw, nickname, p_num) VALUES ('$uid', '$upw', '$nickname', '$p_num')";
        $result = $model->query($query);

        if ($result) {
            return "ok";
        } else {
            $error = mysqli_error($model->dbconn);
            return "$error";
        }
    }
?>
