<?php

    $pdo = new PDO('mysql:host=localhost;dbname=movieDB', 'root', 'root');

    $pdo->exec('SET NAMES UTF8');

    $query = $pdo->prepare
    (
        'SELECT
            id,
            title,
            year,
            rating,
            duration,
            description,
            image,
            video
        FROM movies
        WHERE id = ?'
    );

    // Tells PDO to send the query to MySQL.
    $query->execute(array($_GET['id']));

    $movie = $query->fetch(PDO::FETCH_ASSOC);

    include 'movie-view.php'

?>
