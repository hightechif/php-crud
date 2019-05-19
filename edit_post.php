<?php 
    require_once 'config.php';

    if (isset($_POST['title']) && isset($_POST['content']))
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $id = $_GET['id'];

        $stmt = $conn->prepare('update posts set title=:title, content=:content where id=:id');
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Post dengan judul $title berhasil diedit";
        echo "<br>";
        echo "<a href='index.php'>Kembali</a>";
        exit();
    }
    else
    {
        if (!isset($_GET['id']))
        {
            echo 'Masukkan ID';
            exit();
        }

        $id = $_GET['id'];

        $stmt = $conn->prepare("select * from posts where id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $posts = $stmt->fetchAll();

        if (!count($posts))
        {
            echo "Post tidak ditemukan";
            exit();
        }

        $post = $posts[0];
    }

?>

<h1>My Blog</h1>
<a href="index.php">Home</a> | <a href="new_post.php">Add Post</a> 
<hr>
<form action="" method="post">
    <p>Title: <input type="text" name="title" value="<?php echo $post['title']; ?>" required></p>
    <p>Content: <input type="text" name="content" value="<?php echo $post['content']; ?>" required></p>
    <p><input type="submit" value="Submit"></p>
</form>