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
// default article at index.php
$article = array(
    'title'=>'Welcome',
    'description'=>'We are buliding CRUD in PHP-MySQL.'
);
// print article
if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from koo where id={$filtered_id}";
    // $sql = "select * from koo where id={$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title']=$row['title'];
    $article['description']=$row['description'];
    }
// print_r($article);
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
    <h2><?= $article['title'];?></h2>
    <?= $article['description'];?>
</body>
</html>