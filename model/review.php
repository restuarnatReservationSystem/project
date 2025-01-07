<?php
    function createReview($user_id, $post_id, $review_point, $review){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "INSERT INTO review (user_id, post_id, review_point, review) values ('$user_id', '$post_id', '$review_point', '$review');";
        $result = $model->query($query);

        if ($result) {
            $model->close();
            return true;
        } else {
            $model->close();
            return false;
        }
    }

    function readReview($post_id){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        $query = "SELECT * from review where post_id='$post_id";
        $result = $model->query($query);
        $row = $model->fetch($result);
        
        if($result && mysqli_num_rows($result) != 0){
            
            return $row;
        } else {
            echo "false";
            return false;
        }
    }
?>