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
    <body onload="showComments(<?= $_GET['id']?>)">

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

            <div class="row py-3">
                <div class="col-12">
                    <h3>Comments</h3>
                    <div class="row">
                        <div class="offset-1 col-11" id="commentsContainer">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-3">
                <div class="col-12">
                    <h3>Add comment</h3>
                    <form id='commentForm' action="index.html" method="post">

                        <input type="text" name = "movie" value="<?= $movie['id']?>" hidden>

                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="commentAuthor" name="author" placeholder="Your name"required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-sm-2 col-form-label">Comment</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="commentContent" name="comment" placeholder="Your comment" required>
                            </div>
                        </div>

                        <input type="button" value="Submit" class="submit" onclick="addComment(<?= $movie['id']?>);" />

                    </form>
                </div>
            </div>

        </div>

    </body>
</html>
