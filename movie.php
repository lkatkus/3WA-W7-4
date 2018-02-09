<?php

    $pdo = new PDO('mysql:host=localhost;dbname=movieDB', 'root', 'root');
    $pdo->exec('SET NAMES UTF8');

    // GET MOVIE DATA
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
    $query->execute(array($_GET['id']));
    $movie = $query->fetch(PDO::FETCH_ASSOC);

    // GET ALL THE GENRES
    $sql = 'SELECT * FROM genres';
    $query = $pdo->prepare($sql);
    $query->execute();
    $genres = $query->fetchAll(PDO::FETCH_ASSOC);

    include 'movie-view.php'

?>
