<?php 
    require_once 'config.php';

    $stmt = $conn->prepare("select * from posts");
    $stmt->execute();

    $posts = $stmt->fetchAll();
?>

<h1>My Blog</h1>
<a href="index.php">Home</a> | <a href="new_post.php">Add Post</a> 
<hr>
<ul>
    <?php foreach($posts as $post): ?>
        <li><a href="read_post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></li>
    <?php endforeach; ?>
</ul>
