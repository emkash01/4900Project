<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'database/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AE's Movie Connoisseur</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!--link rel="icon" href="./favicon.ico" type="image/x-icon"-->
  </head>
  <body>
    <nav class = "navbar">
      <ul >
        <li><img src = "assets/images/ProjLogo.png" class = "logo"> </li>
        <li><a href = "index.php">Movies</a></li>
        <li><a href = "shows.php">Shows</a></li>
        <li><a href = "Mylist.php">MyList</a></li>
        <li><a href = "MotW.php">Movie of the Week</a></li>
        <li><a href = "Rating.php">Live Chat</a></li>
        <form method="post" class="search">
            <input type="text" name="search" value="<?= $_POST['search'] ?? '' ?>" class="searchBar" placeholder="Search..">
            <button type="submit" class="submitButton">🔍</button>
        </form>
      </ul>
    </nav>
    <main>
        <h1>My List</h1>
        <div class="rowOneContent">
            <?php
            $sql = "SELECT * FROM movie";
            if(isset($_POST['search'])){
                $sql .= " WHERE title like '%" . $_POST['search'] . "%';";
            }

            $stmt = $pdo->query($sql);

            // Check if we have any movies
            if ($stmt->rowCount() > 0) {

                $movies = $stmt->fetchAll();
                foreach ($movies as $movie) { ?>
                    <div class="container">
                        <div>
                            <a href="IndividualMovie.php?movie_id=<?= $movie['id'] ?>">
                                <img src="<?= $movie['pic'] ?>" alt="<?= $movie['title'] ?>"/>
                            </a>
                            <div class="title-box"></div>
                            <div class="name"><?= $movie['title'] ?></div>
                        </div>
                    </div>
                <?php }
            } else {
                echo '<p>No movies found</p>';
            }
            ?>
        </div>
        <div class="rowOneContent">
            <?php
            $sql = "SELECT * FROM shows";
            if(isset($_POST['search'])){
                $sql .= " WHERE title like '%" . $_POST['search'] . "%';";
            }

            $stmt = $pdo->query($sql);

            // Check if we have any movies
            if ($stmt->rowCount() > 0) {

                $shows = $stmt->fetchAll();
                foreach ($shows as $movie) { ?>
                    <div class="container">
                        <div>
                            <a href="IndividualMovie.php?movie_id=<?= $movie['id'] ?>">
                                <img src="<?= $movie['pic'] ?>" alt="<?= $movie['title'] ?>"/>
                            </a>
                            <div class="title-box"></div>
                            <div class="name"><?= $movie['title'] ?></div>
                        </div>
                    </div>
                <?php }
            } else {
                echo '<p>No movies found</p>';
            }
            ?>
        </div>
    </main>
  </body>
</html>