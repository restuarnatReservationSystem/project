<?php
    function searchRestaurant($search){
        require_once ('model.php');

        $model = new Model();
        $model->open();

        // SQL 쿼리 수정
        $query = "SELECT p.*, r.r_name, r.p_num
                FROM post p
                JOIN restaurant r ON p.restaurant_id = r.restaurant_id
                WHERE r.r_name LIKE '%$search%';";  // r_name에서 검색어를 포함하는 값 찾기

        $result = $model->query($query);

        if($result && mysqli_num_rows($result) != 0){
            $model->close();
            return $result;
        } else {
            $model->close();
            return false;
        }
    }

?>