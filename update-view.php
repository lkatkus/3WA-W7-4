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
                    <a class="btn btn-dark" href="index.php">List</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php if($movie['id']): ?>
                        <h2><?= $movie['title'].' ('.$movie['year'].')'; ?></h2>
                        <form action="movie-update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $movie['id']?>">
                    <?php else: ?>
                        <h2>Add new movie to database</h2>
                        <form action="movie-add.php" method="POST" enctype="multipart/form-data">
                    <?php endif; ?>

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php if($movie['title']){echo $movie['title'];}; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="year" name="year" placeholder="Year" value="<?php if($movie['year']){echo $movie['year'];}; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration in minutes" value="<?php if($movie['duration']){echo $movie['duration'];}; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rating" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rating" name="rating" placeholder="Rating" value="<?php if($movie['rating']){echo $movie['rating'];}; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Genre" class="col-sm-2 col-form-label">Genre</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="genre">
                                <option disabled selected>Select genre</option>
                                <?php foreach ($genres as $genre): ?>
                                    <option value="<?=$genre['id']?>"><?=$genre['title']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rating" class="col-sm-2 col-form-label">Trailer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="video" name="video" placeholder="Link to trailer on Youtube" value="<?php if($movie['video']){echo htmlspecialchars($movie['video']);};?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Poster</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" rows="6"><?php if($movie['description']){echo $movie['description'];}; ?></textarea>
                        </div>
                    </div>

                    <input class="btn btn-dark" type="submit" value="Submit">

                    </form>
                </div>
            </div>

        </div>

    </body>
</html>
