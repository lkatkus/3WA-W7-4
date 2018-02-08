<?php

    $pdo = new PDO('mysql:host=localhost;dbname=movieDB', 'root', 'root');
    $pdo->exec('SET NAMES UTF8');

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    // $image = $_FILES['image'];
    //
    //
    // $path = 'img/'.$image['name'];
    //
    // var_dump($image);
    //
    //
    // move_uploaded_file($image['tmp_name'], $path);

    $sql = "UPDATE movies SET title='".$_POST['title']."',"." year='".$_POST['year']."',"." duration='".$_POST['duration']."',"." rating='".$_POST['rating']."',"." description='".htmlspecialchars($_POST['description'])."',"." video='".$_POST['video']."'"." WHERE id='".$_POST['id']."'";
    print_r($sql);

    $query = $pdo->prepare($sql);
    $query->execute();

    header("Refresh:1; url=index.php");

?>
