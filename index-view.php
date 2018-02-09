<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Best Movies DB</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
    </head>
    <body>

        <div class="container py-3">
            <div class="row">
                <div class="col-6">
                    <h1>Best Movies DB</h1>
                </div>

                <div class="col-6">
                    <div class="align-middle" style="position:relative">
                        <form class="" action="index.php" method="GET">
                            <div class="input-group" >
                                <input type="text" class="form-control" placeholder="Search for..." name="search" id="searchBar" autocomplete="off">
                            </div>
                        </form>
                        <div style="width:100%; position:absolute; background-color:white; z-index:2; border:solid 1px grey" id="searchDemo"></div>
                    </div>
                </div>

                <div class="col-12 py-1">
                    <a class="btn btn-dark" href="index.php">All movies</a>
                    <a class="btn btn-dark" href="update.php">Add</a>
                </div>

                <div class="col-12 py-1">
                    <a class="btn btn-outline-secondary" href="index.php?perPage=5">5</a>
                    <a class="btn btn-outline-secondary" href="index.php?perPage=10">10</a>
                    <a class="btn btn-outline-secondary" href="index.php?perPage=20">20</a>
                    <a class="btn btn-outline-secondary" href="index.php?perPage=30">30</a>
                </div>

                <div class="col-12 py-1">
                    <?php foreach ($genres as $genre): ?>

                        <a class="btn btn-outline-secondary" href="index.php?genre=<?= $genre['id'] ?>"><?= $genre['title'] ?> </a>

                    <?php endforeach; ?>
                </div>
            </div>

            <div class="row py-1">
                <div class="col-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th><a href="index.php?sort=id&amp;sortDirection=<?php if($_GET['sortDirection'] == 'DESC'){echo 'ASC';}elseif($_GET['sortDirection'] == 'ASC'){echo 'DESC';}else{echo 'ASC';}?><?php if(isset($_GET['search'])){echo '&search='.$_GET['search'];}?>">ID</a></th>
                                <th>Title</th>
                                <th><a href="index.php?sort=year&amp;sortDirection=<?php if($_GET['sortDirection'] == 'DESC'){echo 'ASC';}elseif($_GET['sortDirection'] == 'ASC'){echo 'DESC';}else{echo 'ASC';}?><?php if(isset($_GET['search'])){echo '&search='.$_GET['search'];}?>">Year</a></th>
                                <th><a href="index.php?sort=rating&amp;sortDirection=<?php if($_GET['sortDirection'] == 'DESC'){echo 'ASC';}elseif($_GET['sortDirection'] == 'ASC'){echo 'DESC';}else{echo 'ASC';}?><?php if(isset($_GET['search'])){echo '&search='.$_GET['search'];}?>">Rating</a></th>
                                <th><a href="index.php?sort=duration&amp;sortDirection=<?php if($_GET['sortDirection'] == 'DESC'){echo 'ASC';}elseif($_GET['sortDirection'] == 'ASC'){echo 'DESC';}else{echo 'ASC';}?><?php if(isset($_GET['search'])){echo '&search='.$_GET['search'];}?>">Duration</a></th>
                            </tr>
                        </thead>

                        <?php foreach ($movies as $movie): ?>
                        <tr>
                            <td><?= $movie['id'];?></td>
                            <td><a href="movie.php?id=<?= $movie['id'];?>"><?= $movie['title'];?></a></td>
                            <td><?= $movie['year'];?></td>
                            <td><?= $movie['rating'].' / 10';?></td>
                            <td><?= $movie['duration'].' min.';?></td>
                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button class="button btn-dark <?php if($page==1){echo 'd-none';}?>"type="button" name="button"><a href="index.php?page=<?php echo $page-1?><?php if(isset($_GET['perPage'])){echo '&perPage='.$_GET['perPage'];}?>">Previous</a></button>

                    <?php if($totalPages > 1): ?>
                        <?php for($i = 1; $i <= $totalPages; $i++): ?>
                            <button class="button <?php if($page == $i){echo 'btn-secondary';}else{echo 'btn-dark';}; ?>" name="button"><a href="index.php?page=<?php echo $i; ?><?php if(isset($_GET['perPage'])){echo '&perPage='.$_GET['perPage'];}?>"><?php echo $i; ?></a></button>
                        <?php endfor; ?>
                    <?php endif;?>

                    <button class="button btn-dark <?php if($page==$totalPages){echo 'd-none';}?>"type="button" name="button"><a href="index.php?page=<?php echo $page+1?><?php if(isset($_GET['perPage'])){echo '&perPage='.$_GET['perPage'];}?>">Next</a></button>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- <div id="searchDemo"></div> -->
                </div>
            </div>

        </div>

    </body>
</html>
