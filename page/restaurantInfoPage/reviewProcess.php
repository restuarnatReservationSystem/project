<?php
    include('../../model/review.php');
    include('../../model/postProcess.php');
    
    session_start();

    // 폼에서 받은 값 처리
    $user_id = $_SESSION['uid'];  
    $post_id = $_POST['r_name']; 
    $review = $_POST['reviewContent']; 
    $review_point = $_POST['reviewPoint'];  
    $ps = post($post_id);
    // 리뷰 등록
    $result = createReview($user_id, $ps['post_id'], $review, $review_point);
    
    if ($result) {
        echo "리뷰가 등록되었습니다.";
        header("Location: ./restaurantInfoPage.php?r_name=$post_id"); // 리뷰 등록 후 다른 페이지로 바로 이동
        exit; // header 이후에 코드를 실행하지 않도록 exit를 추가
    } else {
        echo "리뷰 등록에 실패했습니다.";
        header("Location: ./restaurantInfoPage.php"); // 실패한 경우에도 이동
        exit; // header 이후에 코드를 실행하지 않도록 exit를 추가
    }
    
?>