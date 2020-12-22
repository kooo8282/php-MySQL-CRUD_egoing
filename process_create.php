<?php
$conn = mysqli_connect(
    '127.0.0.1', 
    'root', 
    '111111', 
    'opentutorials');
$filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description']),
    'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
);
$sql = "
    INSERT INTO koo
        (title, description, created, author_id)
        VALUES(
            '{$filtered['title']}',
            '{$filtered['description']}',
            NOW(),
            '{$filtered['author_id']}'
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