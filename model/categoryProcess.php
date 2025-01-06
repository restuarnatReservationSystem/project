<?php
    function category($category){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "SELECT * from restaurant where category = $category"
        $result = $model->query($query);

        if(isset($result)){
            $model->close();
            return $result;
        } else {
            $model->close();
            return mysqli_error($model->dbconn);
        }
    }
    
?>