<?php
require 'helpers/authentication.php';
require 'database/config.php';
if (!isset($_GET['movie_id']) && !isset($_POST['rate-btn'])) {
    echo '<script>window.location.href = "Mylist.php.php"</script>';
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
        $movie_id = $_POST['movie_id'];
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
        $sql = "SELECT * FROM movie where id = $movie_id";

        $stmt = $pdo->query($sql);

        $movie = $stmt->fetch();
        ?>
        <img src="<?= $movie['pic'] ?>" alt="<?= $movie['title'] ?>">
        <div class="trailer">
            <iframe width="560" height="315" src="<?= $movie['trailer'] ?>" title="<?= $movie['title'] ?>"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="title">
            <h1>Title: <?= $movie['title'] ?></h1>
        </div>
        <div class="synops">
            <h2>Synopsis</h2>
            <p><?= $movie['synop'] ?></p>
        </div>
        <div class="genre">
            <h1>Genre: <?= $movie['genra'] ?></h1>
        </div>
        <div class="sites">
            <h1>Sites: <?= $movie['sites'] ?></h1>
        </div>
        <div class="duration">
            <h1>Duration: <?= $movie['duration'] ?></h1>
        </div>
        <div class="OfficailRating">
            <?php
            $sql = "SELECT AVG(rating) as rating FROM movie_rating WHERE movie_id = $movie_id";
            $stmt = $pdo->query($sql);

            $result = $stmt->fetch();
            ?>
            <h1>Official Rating: <?= $result['rating'] ?></h1>
        </div>
        <div class="OfficailRating">
            <?php
            $sql = "SELECT rating, username FROM movie_rating inner join users u on u.id = movie_rating.user_id WHERE movie_id = $movie_id";
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
                <input type="hidden" name="movie_id" value="<?= $movie_id ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
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