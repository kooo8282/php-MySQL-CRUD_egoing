<?php
$conn = mysqli_connect(
    '127.0.0.1', 
    'root', 
    '111111', 
    'opentutorials');
$sql = "
    INSERT INTO koo
        (title, description, created)
        VALUES(
            '{$_POST['title']}',
            '{$_POST['description']}',
            NOW()
            )";
$result = mysqli_query($conn, $sql);

if ($result === false){
    echo '문제가 생겼습니다.'; //for user
    error_log(mysqli_error($conn)); //for master
} else{
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
}
// echo $sql;
?>