<?php
$conn = mysqli_connect("127.0.0.1", "root", "111111", "opentutorials");
$sql="INSER INTO koo (title, description, created) 
        VALUE ('HTML', 'HTML is ...', NOW())";
$result = mysqli_query($conn, $sql);
echo mysqli_error($conn);
?>