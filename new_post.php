<?php 
    require_once 'config.php';

    if (isset($_POST['title']) && isset($_POST['content']))
    {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $stmt = $conn->prepare('insert into posts (title, content) values (:title, :content)');
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->execute();

        echo "Post dengan judul $title berhasil dibuat";
        echo "<br>";
        echo "<a href='index.php'>Kembali</a>";
        exit();
    }

?>

<h1>My Blog</h1>
<a href="index.php">Home</a> | <a href="new_post.php">Add Post</a> 
<hr>
<form action="" method="post">
    <p>Title: <input type="text" name="title" required></p>
    <p>Content: <input type="text" name="content" required></p>
    <p><input type="submit" value="Submit"></p>
</form>