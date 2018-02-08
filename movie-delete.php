<?php

    $pdo = new PDO('mysql:host=localhost;dbname=movieDB', 'root', 'root');
    $pdo->exec('SET NAMES UTF8');

    $sql = "DELETE FROM movies WHERE id='".$_GET['id']."'";

    print_r($sql);

    $query = $pdo->prepare($sql);
    $query->execute();
    
    header("Refresh:1; url=index.php");

?>
