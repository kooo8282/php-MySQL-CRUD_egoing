<?php
$conn = mysqli_connect(
    '127.0.0.1', 
    'root', 
    '111111', 
    'opentutorials');
settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);
$sql = "
    UPDATE koo
        SET
            title = '{$filtered['title']}',
            description = '{$filtered['description']}'
        WHERE
            id = {$filtered['id']}
";
$result = mysqli_query($conn, $sql);

if ($result === false){
    echo '문제가 생겼습니다.'; //for user
    error_log(mysqli_error($conn)); //for master
} else{
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
}
// echo $sql;
?>