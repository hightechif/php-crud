<?php 
    require_once 'config.php';

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
    }
    else{
        $id = 0;
    }

    $stmt = $conn->prepare("select * from posts where id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $post = $stmt->fetch();
?>

<h1>My Blog</h1>
<a href="index.php">Home</a> | <a href="new_post.php">Add Post</a> 
<hr>
<a href="edit_post.php?id=<?php echo $post['id']; ?>">Edit</a> | <a href="delete_post.php?id=<?php echo $post['id']; ?>">Delete</a>
<h3><?php echo $post['title']; ?></h3>
<p><?php echo $post['content']; ?></p>