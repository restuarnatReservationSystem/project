<?php
    function userLoginProcess($uid, $upw){
        require_once './model.php';

        $model = new Model();
        $model->open();

        $query = "SELECT * FROM user WHERE user_id = '$uid' && upw = '$upw';";
        $result = $model->query($query);
        $user = $model->fetch($result);

        if(isset($user)){
            session_start();
            $_SESSION['uid'] = $user['uid'];
            $_SESSION['nickanme'] = $user['nickname'];
            $_SESSION['p_num'] = $user['p_num'];
            $_SESSION['time'] = time();

            $model->close();
            return null

        }else{
            $model->close()
            return null;
        }
    }
?>
