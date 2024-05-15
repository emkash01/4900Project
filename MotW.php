<?php
    require 'helpers/authentication.php';
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
        <li><a href="movies.php">Movies</a></li>
        <li><a href="shows.php">Shows</a></li>
        <li><a href="Mylist.php">MyList</a></li>
        <li><a href="MotW.php">Movie of the Week</a></li>
        <li><a href="Rating.php">Live Chat</a></li>
        <li><a href="helpers/logout.php">Logout</a></li>
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
