<?php

    $pdo = new PDO('mysql:host=localhost;dbname=movieDB', 'root', 'root');
    $pdo->exec('SET NAMES UTF8');

    $sql = "INSERT INTO movies(title,year,duration,rating,description,image,video)
    VALUES('".$_POST['title']."','".$_POST['year']."','".$_POST['duration']."','".$_POST['rating']."','".htmlentities($_POST['description'], ENT_QUOTES)."','".$_POST['image']."','".$_POST['video']."')";

    print_r($sql);

    $query = $pdo->prepare($sql);
    $query->execute();

    header("Refresh:1; url=index.php");

?>
