<?php

    $pdo = new PDO('mysql:host=localhost;dbname=movieDB', 'root', 'root');
    $pdo->exec('SET NAMES UTF8');

    $query = $pdo->prepare
    (
        'SELECT
            comment_id,
            comment_author,
            comment_content
        FROM comments
        WHERE movie_id = ?'
    );
    $query->execute(array($_GET['id']));
    $comments = $query->fetchAll(PDO::FETCH_ASSOC);

    $myJSON = json_encode($comments);

    echo $myJSON;

?>
