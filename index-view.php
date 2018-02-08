<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Best Movies DB</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="container py-3">
            <div class="row py-3">
                <div class="col-12">
                    <h1>Best Movies DB</h1>
                    <a class="btn btn-dark" href="update.php">Add</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th><a href="index.php?sort=id&amp;sortDirection=<?php if($_GET['sortDirection'] == 'DESC'){echo 'ASC';}elseif($_GET['sortDirection'] == 'ASC'){echo 'DESC';}else{echo 'ASC';}?>">ID</a></th>
                                <th>Title</th>
                                <th><a href="index.php?sort=year&amp;sortDirection=<?php if($_GET['sortDirection'] == 'DESC'){echo 'ASC';}elseif($_GET['sortDirection'] == 'ASC'){echo 'DESC';}else{echo 'ASC';}?>">Year</a></th>
                                <th><a href="index.php?sort=rating&amp;sortDirection=<?php if($_GET['sortDirection'] == 'DESC'){echo 'ASC';}elseif($_GET['sortDirection'] == 'ASC'){echo 'DESC';}else{echo 'ASC';}?>">Rating</a></th>
                                <th><a href="index.php?sort=duration&amp;sortDirection=<?php if($_GET['sortDirection'] == 'DESC'){echo 'ASC';}elseif($_GET['sortDirection'] == 'ASC'){echo 'DESC';}else{echo 'ASC';}?>">Duration</a></th>
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
                    <button class="button btn-dark <?php if($page==1){echo 'd-none';}?>"type="button" name="button"><a href="index.php?page=<?php echo $page-1?>">Previous</a></button>

                    <?php for($i = 1; $i <= $totalPages; $i++): ?>
                        <button class="button btn-dark" name="button"><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></button>
                    <?php endfor; ?>
                    
                    <button class="button btn-dark <?php if($page==$totalPages){echo 'd-none';}?>"type="button" name="button"><a href="index.php?page=<?php echo $page+1?>">Next</a></button>
                </div>

            </div>

        </div>

    </body>
</html>
