<?php
$conn = mysqli_connect(
    '127.0.0.1', 
    'root', 
    '111111', 
    'opentutorials');

$sql = "select * from koo limit 1000";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){    
    $list = $list."<li>{$row['title']}</li>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>WEB</title>
</head>
<body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
        <?php
        echo $list;
        ?>      
    </ol>
    <a href="create.php">Create</a>
    <h2>Welcome</h2>
    HTML is Lorem ipsum dolor sit amet consectetur, adipisicing elit.
</body>
</html>