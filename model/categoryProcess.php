<?php
    function category($category){
        require_once './model.php';

        $model = new Model();
        $model->open();

        $query = "SELECT * from restaurant where category = $category"
        $result = $model->query($query);

        if(isset($result)){
            return $result;
        } else {
            return mysqli_error($model->dbconn)
        }
    }
?>