<?php
    if (!function_exists('createReview')) {
        function createReview($user_id, $post_id, $review, $review_point) {
            require_once('model.php');
        
            $model = new Model();
            $model->open();
        
            // 평점도 같이 삽입하도록 수정
            $query = "INSERT INTO review (user_id, post_id, review, review_point) 
                      VALUES ('$user_id', '$post_id', '$review', '$review_point');";
            $result = $model->query($query);
        
            if ($result) {
                $model->close();
                return true;
            } else {
                $model->close();
                return false;
            }
        }
        
    }

    if (!function_exists('readReview')) {
        function readReview($post_id) {
            require_once('model.php');
        
            $model = new Model();
            $model->open();
        
            // query 실행
            $query = "SELECT * FROM review WHERE post_id='$post_id';";
            $result = $model->query($query);  // 쿼리 결과를 $result로 받음
            
            if ($result && mysqli_num_rows($result) > 0) {  // mysqli_num_rows() 사용
                $reviews = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $reviews[] = $row;  // 결과를 배열로 반환
                }
                $model->close();
                return $reviews;  // 배열로 반환
            } else {
                $model->close();
                return false;  // 데이터 없을 경우 false 반환
            }
        }
        
        
    }

?>