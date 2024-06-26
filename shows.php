<?php
    require 'helpers/authentication.php';
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
<body>
<nav class="navbar">
    <ul>
    <li><img src = "assets/images/ProjLogo.png" class = "logo"> </li>
        <li><a href="movies.php">Movies</a></li>
        <li><a href="shows.php">Shows</a></li>
        <li><a href="Mylist.php">MyList</a></li>
        <li><a href="MotW.php">Movie of the Week</a></li>
        <li><a href="Rating.php">Live Chat</a></li>
        <li><a href="helpers/logout.php">Logout</a></li>
        <form method="post" class="search">
            <input type="text" name="search" value="<?= $_POST['search'] ?? '' ?>" class="searchBar" placeholder="Search..">
            <button type="submit" class="submitButton">🔍</button>
        </form>
    </ul>
</nav>
<h1>Shows</h1>
<h2>Anime</h2>
<div class="rowOneContent">
    <?php
    $sql = "SELECT * FROM shows WHERE id > 0 AND id < 6";
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
                    <a href="IndividualShow.php?show_id=<?= $show['id'] ?>">
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
</div>
<h2>Random</h2>
<div class="rowOneContent">
    <?php
    $sql = "SELECT * FROM shows WHERE id > 5 AND id < 11";
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
                    <a href="IndividualShow.php?show_id=<?= $show['id'] ?>">
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
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

