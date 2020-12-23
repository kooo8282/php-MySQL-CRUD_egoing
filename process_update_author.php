<?php
$conn = mysqli_connect(
    '127.0.0.1', 
    'root', 
    '111111', 
    'opentutorials');
settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'name'=>mysqli_real_escape_string($conn, $_POST['name']),
    'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);
$sql = "
    UPDATE author
        SET
            name = '{$filtered['name']}',
            profile = '{$filtered['profile']}'
        WHERE
            id = {$filtered['id']}
";
$result = mysqli_query($conn, $sql);

if ($result === false){
    echo '문제가 생겼습니다.'; //for user
    error_log(mysqli_error($conn)); //for master
} else{
    header('Location: author.php?id='.$filtered['id']);
}
// echo $sql;
?>