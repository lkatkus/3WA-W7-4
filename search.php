<?php

    if(isset($_GET['search'])){

        $pdo = new PDO('mysql:host=localhost;dbname=movieDB', 'root', 'root');
        $pdo->exec('SET NAMES UTF8');

        $search = $_GET['search'];
        $sql = 'SELECT id, title, year, rating, duration FROM movies WHERE title LIKE \'%'.$search.'%\'';
        $query = $pdo->prepare($sql);
        $query->execute();
        $movies = $query->fetchAll(PDO::FETCH_ASSOC);

        $myJSON = json_encode($movies);
        echo $myJSON;

    }else{
        echo 'ERROR';
    }

?>
