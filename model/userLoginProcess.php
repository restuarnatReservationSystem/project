<?php
    function userLoginProcess($uid, $upw){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "SELECT * FROM customer WHERE customer_id = '$uid' && upw = '$upw';";
        $result = $model->query($query);
        $user = $model->fetch($result);

        if(isset($user)){
            session_start();
            $_SESSION['uid'] = $user['customer_id'];
            $_SESSION['nickname'] = $user['nickname'];  
            $_SESSION['time'] = time();

            $model->close();
            return true;

        }else{
            $model->close();
            return false;
        }
    }
?>
