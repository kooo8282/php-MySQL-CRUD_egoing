<?php
$conn = mysqli_connect(
    '127.0.0.1', 
    'root', 
    '111111', 
    'opentutorials');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Author</title>
</head>
<body>
    <h1><a href="index.php">WEB</a></h1>
    <p><a href="index.php">Index</a></p>
    <table border="2">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>profile</td>
            <td></td>
            <?php
            $sql = "select * from author";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
                $filtered = array(
                    'id'=>htmlspecialchars($row['id']),
                    'name'=>htmlspecialchars($row['name']),
                    'profile'=>htmlspecialchars($row['profile'])
                )
            ?>
            <tr>
                <td><?=$filtered['id']?></td>
                <td><?=$filtered['name']?></td>
                <td><?=$filtered['profile']?></td>
                <td><a href="author.php?id=<?=$filtered['id']?>">update</a></td>
            </tr>
            <?php
            }
            ?>
        </tr>
    </table>
    <?php
    $escaped=array(
        'name'=>'',
        'profile'=>''
    );
    $label_submit='Create author';
    $form_action='process_create_author.php';
    $form_id='';
    if(isset($_GET['id'])){
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        settype($filtered_id, 'integer');
        $sql = "select * from author where id={$filtered_id}";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);        
        $escaped['name']=htmlspecialchars($row['name']);
        $escaped['profile']=htmlspecialchars($row['profile']);
        $label_submit='Update author';
        $form_action='process_update_author.php';
        $form_id='<input type="hidden" name="id" value="'.$_GET['id'].'">';
        // print_r($escaped);
    }
    ?>
    <form action="<?=$form_action?>" method="post">
        <?=$form_id?>    
        <p><input type="text" name="name" placeholder="author name" value="<?=$escaped['name']?>"></p>
        <p><textarea name="profile" cols="30" rows="10" placeholder="profile"><?=$escaped['profile']?></textarea></p>
        <input type="submit" value="<?=$label_submit?>">
    </form>
</body>
</html>