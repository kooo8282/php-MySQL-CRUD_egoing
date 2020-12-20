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
    //<li><a href="index.php?id=5">mysql</a></li>
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
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
        <?= $list ?>      
    </ol>
    <a href="create.php">Create</a>
    <h2>
        <?php
        echo $_GET['id']
        ?>

    </h2>
    HTML is Lorem ipsum dolor sit amet consectetur, adipisicing elit.
</body>
</html>