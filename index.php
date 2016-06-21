<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <td><label>Title</label></td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td><label>Content</label></td>
                <td><textarea name="content" id="" cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
                <td><label>Date</label></td>
                <td><input type="text" name="date"></td>
            </tr>
            <tr>
                <td><label>Author</label></td>
                <td><input type="text" name="author"></td>
            </tr>
            <tr>
                <td><button name="submit">Send</button></td>
            </tr>
        </table>
    </form>
</body>
</html>


<?php

echo "<pre>";
print_r(PDO::getAvailableDrivers());
echo "</pre>";

//require_once "db.php";
require_once "post.php";



//$id = 2;
//$params = [':id' => $id];
if($res = $pdo->prepare("SELECT title, content, author FROM posts WHERE id = :id"))
{
    $res->setFetchMode(PDO::FETCH_CLASS, 'Posts');
    while($row = $res->fetch())
    {
        echo $row->info();
    }
}

/*
if($result = $mysqli->prepare('SELECT title, author FORM posts WHERE id = ?'))
{
    $result->bind_param('i', $id);

    $result->execute();
    $result->bind_result($col1, $col2);

    while($result->fetch())
    {
        printf("%s %s<br>", $col1, $col2);
    }
    $result->close();
}



while ($row = mysql_fetch_array($res))
{
    echo "id - ".$row['id']."<br>";
    echo "title - ".$row['title']."<br>";
    echo "content - ".$row['content']."<br>";
    echo "date - ".$row['date']."<br>";
    echo "author - ".$row['author']."<br>";
}

if(isset($_POST['submit']))
{
    $query = "INSERT INTO posts (title, content, date, author) VALUES (?, ?, ?, ?)";

    $stmt->prepare($query);
    $stmt->bind_param('ssss', $_POST['title'], $_POST['content'], $_POST['date'], $_POST['author']);
    $stmt->execute();
    echo $stmt->affected_rows."<br>";

    $res = mysql_query($query, $stmt) or die('Can not insert date in database' .mysql_error());
}
*/
?>

