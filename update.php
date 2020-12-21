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
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}
// default article at index.php
$article = array(
    'title'=>'Welcome',
    'description'=>'We are buliding CRUD using PHP-MySQL interface.'
);
// print article
$update_link = '';
if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from koo where id={$filtered_id}";
    // $sql = "select * from koo where id={$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title']=htmlspecialchars($row['title']);
    $article['description']=htmlspecialchars($row['description']);
    
    $update_link = '<a href="update.php?id='.$_GET['id'].'">Update</a>';
    
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
    <form action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <p><input type="text" name="title" placeholder="Title" value="<?=$article['title']?>"></p>
        <p><textarea name="description" cols="30" rows="10" placeholder="description"><?=$article['description']?></textarea></p>
        <input type="submit" value="submit">
    </form>
</body>
</html>