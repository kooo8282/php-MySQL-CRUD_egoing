<?php
$conn = mysqli_connect(
    '127.0.0.1', 
    'root', 
    '111111', 
    'opentutorials');
settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id'])    
);
$sql = "
    DELETE FROM author
        WHERE id = {$filtered['id']}
";
$result = mysqli_query($conn, $sql);

if ($result === false){
    echo '문제가 생겼습니다.'; //for user
    error_log(mysqli_error($conn)); //for master
} else{
    header('Location: author.php');
}
?>