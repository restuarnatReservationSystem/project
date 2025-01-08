<?php
    if (!function_exists('createReview')) {
        function createReview($user_id, $post_id, $review, $review_point) {
            require_once('model.php');
    
            $model = new Model();
            $model->open();
            
            // 평점도 같이 삽입하도록 수정
            // 리뷰가 존재하면 업데이트
            $query = "SELECT * FROM review WHERE customer_id = '$user_id' AND post_id = '$post_id'";
            $result = $model->query($query);
        
            if ($result && mysqli_num_rows($result) > 0) {
                // 리뷰가 있다면 수정
                $update_query = "UPDATE review SET review = '$review', review_point = $review_point
                                 WHERE customer_id = '$user_id' AND post_id = '$post_id'";
                $update_result = $model->query($update_query);
        
                if ($update_result) {
                    $model->close();
                    return true;  // 업데이트 성공 시 true 반환
                } else {
                    $model->close();
                    return false; // 업데이트 실패 시 false 반환
                }
            } else {
                // 리뷰가 없다면 삽입
                $insert_query = "INSERT INTO review (review, review_point, post_id, customer_id) 
                                 VALUES ('$review', $review_point, $post_id, '$user_id')";
                $insert_result = $model->query($insert_query);
        
                if ($insert_result) {
                    $model->close();
                    return true;  // 삽입 성공 시 true 반환
                } else {
                    $model->close();
                    return false; // 삽입 실패 시 false 반환
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
}
?>