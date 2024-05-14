<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'database/config.php';
if (!isset($_GET['shows_id']) && !isset($_POST['rate-btn'])) {
    echo '<script>window.location.href = "shows.php.php"</script>';
}
$movie_id = $_GET['movie_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/IndividualMovie.css">
</head>
<body>
<div class=container>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rate-btn'])) {
        // Validate and sanitize inputs
        $shows_id = $_POST['shows_id'];
        $user_id = $_POST['user_id'];
        $rating = $_POST['rating'];

        try {
            $sql = "INSERT INTO movie_rating (user_id, movie_id, rating) VALUES (:user_id, :movie_id, :rating)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
            $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
            $stmt->execute();
            echo "<script>alert('Rating successfully added!');location.href='Mylist.php'</script>";
        } catch (PDOException $e) {
            echo "<script>alert('An unknown error occurred while submitting rating! Please try again');location.href='Mylist.php'</script>";
        }
    }
    ?>
    <div class=box>
        <?php
        $sql = "SELECT * FROM shows where id = $shows_id";

        $stmt = $pdo->query($sql);

        $shows = $stmt->fetch();
        ?>
        <img src="<?= $shows['pic'] ?>" alt="<?= $shows['title'] ?>">
        <div class="trailer">
            <iframe width="560" height="315" src="<?= $shows['trailer'] ?>" title="<?= $shows['title'] ?>"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="title">
            <h1>Title: <?= $shows['title'] ?></h1>
        </div>
        <div class="synops">
            <h2>Synopsis</h2>
            <p><?= $shows['synop'] ?></p>
        </div>
        <div class="genre">
            <h1>Genre: <?= $shows['genra'] ?></h1>
        </div>
        <div class="sites">
            <h1>Sites: <?= $shows['sites'] ?></h1>
        </div>
        <div class="duration">
            <h1>Duration: <?= $shows['duration'] ?></h1>
        </div>
        <div class="OfficailRating">
            <?php
            $sql = "SELECT AVG(rating) as rating FROM shows_rating WHERE shows_id = $shows_id";
            $stmt = $pdo->query($sql);

            $result = $stmt->fetch();
            ?>
            <h1>Official Rating: <?= $result['rating'] ?></h1>
        </div>
        <div class="OfficailRating">
            <?php
            $sql = "SELECT rating, username FROM shows_rating inner join users u on u.id = shows_rating.user_id WHERE shows_id = $shows_id";
            $stmt = $pdo->query($sql);

            $result = $stmt->fetchAll();
            ?>
            <h1>User's Rating:</h1>
            <ul style="margin-left: 2rem;">
                <?php
                foreach ($result as $row) {
                    echo "<li>" . $row['username'] . ": " . $row['rating'] . "</li>";
                }
                ?>
            </ul>
        </div>
        <div class="yourRating">
            <h1>Personal Rating</h1>
            <form class="rating" method="post">
                <input type="hidden" name="shows_id" value="<?= $shows_id ?>">
                <input type="hidden" name="user_id" value="1">
                <select name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <input type="submit" name="rate-btn" value="Rate">
            </form>
        </div>
    </div>
</div>
</body>
</html>