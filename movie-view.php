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
                    <a class="btn btn-dark" href="update.php?id=<?=$movie['id']?>">Edit</a>
                    <a class="btn btn-danger" href="movie-delete.php?id=<?=$movie['id']?>">Delete</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2><?= $movie['title'].' ('.$movie['year'].')'; ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p class="text-justify"><?= $movie['description']; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="video-wrapper">
                        <iframe src="<?= $movie['video']; ?>" width="" height=""></iframe>
                    </div>
                </div>
                <div class="col-6">
                    img
                </div>
            </div>

        </div>

    </body>
</html>
