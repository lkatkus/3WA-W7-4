<?php

    // CONNECTING TO DATABASE
    $pdo = new PDO('mysql:host=localhost;dbname=movieDB', 'root', 'root');
    $pdo->exec('SET NAMES UTF8');

    // GETTING SORTING DATA
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

    // SETTING PAGES
    if(isset($_GET['perPage'])){
        $perPage = $_GET['perPage'];
    }else{
        $perPage = 5;
    }

    // GETTING TOTAL AMOUNT OF PAGES
    $sql = 'SELECT COUNT(id) as totalNumber FROM movies';
    $query = $pdo->prepare($sql);
    $query->execute();
    $totalMovies = $query->fetch(PDO::FETCH_ASSOC);
    $totalPages = ceil($totalMovies['totalNumber'] / $perPage);


    // SETTING PAGINATION
    if(isset($_GET['page'])){
        if($_GET['page'] < 1){
            $page = 1;
            $pageOffset = 0;
        }elseif($_GET['page'] > 0 && $_GET['page'] <= $totalPages){
            $page = $_GET['page'];
            $pageOffset = $_GET['page'] * $perPage - $perPage;
        }elseif($_GET['page'] > $totalPages){
            $page = $totalPages;
            $pageOffset =  $page * $perPage - $perPage;
        }
    }else{
        $pageOffset = 0;
        $page = 1;
    }

    // GET ALL THE GENRES
    $sql = 'SELECT * FROM genres';
    $query = $pdo->prepare($sql);
    $query->execute();
    $genres = $query->fetchAll(PDO::FETCH_ASSOC);

    // SETTING SHOW PARAMETERS
    if(isset($_GET['search'])){
        $search = $_GET['search'];
        $sql = 'SELECT id, title, year, rating, duration FROM movies WHERE title LIKE \'%'.$search.'%\' ORDER BY '.$sortBy.' '.$sortDirection.' LIMIT '.$perPage.' OFFSET '.$pageOffset;
        $query = $pdo->prepare($sql);
        $query->execute();
        $movies = $query->fetchAll(PDO::FETCH_ASSOC);
    }elseif(isset($_GET['genre'])){
        $genre = $_GET['genre'];
        $sql = 'SELECT id, title, year, rating, duration FROM movies WHERE genre_id ='.$genre.' ORDER BY '.$sortBy.' '.$sortDirection.' LIMIT '.$perPage.' OFFSET '.$pageOffset;
        $query = $pdo->prepare($sql);
        $query->execute();
        $movies = $query->fetchAll(PDO::FETCH_ASSOC);

    }else{
        $sql = 'SELECT id, title, year, rating, duration FROM movies ORDER BY '.$sortBy.' '.$sortDirection.' LIMIT '.$perPage.' OFFSET '.$pageOffset;
        $query = $pdo->prepare($sql);
        $query->execute();
        $movies = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // INCLUDE MAIN VIEW FILE
    include 'index-view.php';

?>
