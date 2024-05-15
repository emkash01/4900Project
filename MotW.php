<?php
header('Content-Type: application/json');

// Database connection settings
$host = 'localhost';
$dbName = '4900proj';
$user = 'postgres';
$password = "Artur7799";
$port = '5432';

$dsn = "pgsql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Fetch a random movie
$stmt = $pdo->query("SELECT * FROM movie ORDER BY RANDOM() LIMIT 1");
$movie = $stmt->fetch();

echo json_encode($movie);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrailerFlix Movie of the Week</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <nav class="navbar">
      <ul>
        <li><img src="assets/images/ProjLogo.png" class="logo"></li>
        <li><a href="index.php">Movies</a></li>
        <li><a href="shows.php">Shows</a></li>
        <li><a href="Mylist.php">MyList</a></li>
        <li><a href="MotW.php">Movie of the Week</a></li>
        <li><a href="Rating.php">Live Chat</a></li>
        <div class="search">
          <input type="text" placeholder="Search..">
          <button type="submit" class="submitButton">icon</button>
        </div>
      </ul>
    </nav>
    <main>
      <div id="trailer-container">
        <h2>Movie of the Week</h2>
        <iframe id="trailer" width="560" height="315" frameborder="0" allowfullscreen></iframe>
        <h3 id="movie-title"></h3>
        <p id="movie-synop"></p>
      </div>
    </main>
    <script src="MotW.js"></script>
  </body>
</html>
