<?php
$conn = mysqli_connect(
    '127.0.0.1', 
    'root', 
    '111111', 
    'opentutorials');
$filtered = array(
    'name'=>mysqli_real_escape_string($conn, $_POST['name']),
    'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])   
);
$sql = "
    INSERT INTO author
        (name, profile)
        VALUES(
            '{$filtered['name']}',
            '{$filtered['profile']}'
            )";
$result = mysqli_query($conn, $sql);
echo $sql;
if ($result === false){
    echo '문제가 생겼습니다.'; //for user
    error_log(mysqli_error($conn)); //for master
} else{
    header('Location: author.php');
}
// echo $sql;
?>