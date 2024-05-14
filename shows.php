<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'database/config.php';
?>
<!DOCTYPE html>
<html lang="en"
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AE's Movie Connoisseur</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("Image");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 2].style.display = "block";
        x[slideIndex - 1].style.display = "block";
    }
</script>
<nav class="navbar">
    <ul>
        <li><img src="assets/images/ProjLogo.png" class="logo"></li>
        <li><a href="index.php">Movies</a></li>
        <li><a href="shows.php">Shows</a></li>
        <li><a href="Mylist.php">MyList</a></li>
        <li><a href="MotW.php">Movie of the Week</a></li>
        <li><a href="Rating.php">Live Chat</a></li>
        <form method="post" class="search">
            <input type="text" name="search" value="<?= $_POST['search'] ?? '' ?>" class="searchBar" placeholder="Search..">
            <button type="submit" class="submitButton">🔍</button>
        </form>
    </ul>
</nav>
<h1>Shows</h1>
<h2>Random Genre</h2>
<div class="rowOneContent">
    <button class="goLeft" onclick="plusDivs(-1)"><!--&lsaquo;-->
        <ion-icon name="caret-back-outline"></ion-icon>
    </button>
    <?php
    $sql = "SELECT * FROM shows";
    if(isset($_POST['search'])){
        $sql .= " WHERE title like '%" . $_POST['search'] . "%';";
    }

    $stmt = $pdo->query($sql);

    // Check if we have any movies
    if ($stmt->rowCount() > 0) {

        $shows = $stmt->fetchAll();
        foreach ($shows as $show) { ?>
            <div class="container">
                <div>
                    <a href="IndividualShow.php?shows_id=<?= $show['id'] ?>">
                        <img src="<?= $show['pic'] ?>" alt="<?= $show['title'] ?>"/>
                    </a>
                    <div class="title-box"></div>
                    <div class="name"><?= $show['title'] ?></div>
                </div>
            </div>
        <?php }
    } else {
        echo '<p>No movies found</p>';
    }
    ?>
    <button class="goRight" onclick="plusDivs(1)">&rsaquo;</button>
</div>
<h2>Anime</h2>
<div class="rowOneContent">
    <button class="goLeft" onclick="plusDivs(-1)"><!--&lsaquo;-->
        <ion-icon name="caret-back-outline"></ion-icon>
    </button>
    <?php
    $sql = "SELECT * FROM shows";
    if(isset($_POST['search'])){
        $sql .= " WHERE title like '%" . $_POST['search'] . "%';";
    }

    $stmt = $pdo->query($sql);

    // Check if we have any shows
    if ($stmt->rowCount() > 0) {

        $shows = $stmt->fetchAll();
        foreach ($shows as $show) { ?>
            <div class="container">
                <div>
                    <a href="IndividualShow.php?movie_id=<?= $show['id'] ?>">
                        <img src="<?= $show['pic'] ?>" alt="<?= $show['title'] ?>"/>
                    </a>
                    <div class="title-box"></div>
                    <div class="name"><?= $show['title'] ?></div>
                </div>
            </div>
        <?php }
    } else {
        echo '<p>No shows found</p>';
    }
    ?>
    <button class="goRight" onclick="plusDivs(1)">&rsaquo;</button>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

