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
$delete_btn = '';
$author = '';
if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from koo left join author on koo.author_id=author.id where koo.id={$filtered_id}";
    // $sql = "select * from koo where id={$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title']=htmlspecialchars($row['title']);
    $article['description']=htmlspecialchars($row['description']);
    
    $article['name']=htmlspecialchars($row['name']);
    $update_link = '<a href="update.php?id='.$_GET['id'].'">Update</a>'; 
    $delete_btn = '
        <form action="process_delete.php" method="post">
            <input type="hidden" name="id" value="'.$_GET['id'].'">
            <input type="submit" value="Delete">
        </form>    
    ';
    $author = '<p>by <b>'.$article['name'].'</p>';
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
    <a href="author.php">Author</a>
    <ol>
        <?= $list ?>      
    </ol>
    <a href="create.php">Create</a>
    <?=$update_link?>
    <?=$delete_btn?>    
    <h2><?= $article['title']?></h2>
    <p><?= $article['description']?></p>
    <?=$author?> 
</body>
</html>