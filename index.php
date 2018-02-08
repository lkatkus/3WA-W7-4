<?php

    $pdo = new PDO('mysql:host=localhost;dbname=movieDB', 'root', 'root');

    $pdo->exec('SET NAMES UTF8');

    if(isset($_GET['sort'])){
        $sortBy = $_GET['sort'];
        if($_GET['sortDirection'] == 'ASC'){
            $sortDirection = 'ASC';
        }else{
            $sortDirection = 'DESC';
        }
    }else{
        $sortBy = 'id';
        $sortDirection = 'ASC';
    }

    if(isset($_GET['perPage'])){
        $perPage = $_GET['perPage'];
    }else{
        $perPage = 5;
    }

    if(isset($_GET['page'])){
        if($_GET['page'] < 1){
            $page = 1;
        }else{
            $page = $_GET['page'];
            $pageOffset = $_GET['page'] * $perPage - $perPage;
        }
    }else{
        $pageOffset = 0;
        $page = 1;
    }

    $sql = 'SELECT id, title, year, rating, duration FROM movies ORDER BY '.$sortBy.' '.$sortDirection.' LIMIT '.$perPage.' OFFSET '.$pageOffset;

    $query = $pdo->prepare($sql);

    $query->execute();

    $movies = $query->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT COUNT(id) as totalNumber FROM movies';

    $query = $pdo->prepare($sql);

    $query->execute();

    $totalMovies = $query->fetch(PDO::FETCH_ASSOC);

    $totalPages = ceil($totalMovies['totalNumber'] / $perPage);

    include 'index-view.php';

?>
