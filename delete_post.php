<?php
    require_once 'config.php';

    if (!isset($_GET['id']))
    {
        echo "Masukkan ID";
        exit();
    }

    $id = $_GET['id'];

    $stmt = $conn->prepare('delete from posts where id=:id');
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    echo "Post berhasil dihapus";
    echo "<br>";
    echo "<a href='index.php'>Kembali</a>";
    exit();