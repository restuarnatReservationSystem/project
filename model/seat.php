<?php
function createSeat($r_name, $seat) {
    require_once('model.php');

    $model = new Model();
    $model->open();

    $isSuccessful = true; // 모든 쿼리가 성공했는지 확인하기 위한 변수

    for ($n = 1; $n < 9; $n++) {
        $query = "INSERT INTO seat (s_type, s_index, r_name) VALUES ('$seat', '$n', '$r_name')";
        $result = $model->query($query);

        // 하나라도 실패하면 $isSuccessful을 false로 설정
        if (!$result) {
            $isSuccessful = false;
            break; // 실패 시 루프 중단
        }
    }

    $model->close();
    return $isSuccessful; // 최종 결과 반환
}
?>
