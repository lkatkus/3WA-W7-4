<?php

    if(isset($_POST['author'])){
        $pdo = new PDO('mysql:host=localhost;dbname=movieDB', 'root', 'root');
        $pdo->exec('SET NAMES UTF8');

        $sql = 'INSERT INTO comments (movie_id,comment_author,comment_content) VALUES ('.$_POST['movie'].', \''.$_POST['author'].'\', \''.$_POST['comment'].'\')';
        echo $sql;

        $query = $pdo->prepare($sql);
        $query->execute();

    }else{
        echo 'ERROR';
    }

?>
