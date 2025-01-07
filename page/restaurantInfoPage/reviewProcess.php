<?php
    include('../../model/review.php');
    include('../../model/postProcess.php');
    
    session_start();

    // 폼에서 받은 값 처리
    $user_id = $_SESSION['uid'];  // 로그인된 사용자의 ID
    $post_id = $_POST['r_name'];  // 포스트 이름을 post_id로 사용
    $review = $_POST['reviewContent'];  // 리뷰 내용
    $review_point = $_POST['reviewPoint'];  // 평점

    // 리뷰 등록
    $result = createReview($user_id, $post_id, $review, $review_point);

    if ($result) {
        echo "리뷰가 등록되었습니다.";
    } else {
        echo "리뷰 등록에 실패했습니다.";
    }
?>