<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrailerFlix Movie of the week</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!--link rel="icon" href="./favicon.ico" type="image/x-icon"-->
  </head>
  <body>
     
    <nav class = "navbar">
      <ul>
        <li><img src = "assets/images/ProjLogo.png" class = "logo"> </li>
        <li><a href = "index.php">Movies</a></li>
        <li><a href = "shows.php">Shows</a></li>
        <li><a href = "Mylist.php">MyList</a></li>
        <li><a href = "MotW.php">Movie of the Week</a></li>
        <li><a href = "Rating.php">Live Chat</a></li>
        <div class="search">
            <input type="text" placeholder="Search..">
            <button type="submit" class = "submitButton">icon</button>
        </div>
      </ul>
    </nav>
    <main>
      <div id = "trailer-container">
        <h2>Movie of the Week</h2>
        <iframe id = "trailer" width = "560" height = "315" frameborder = "0" allowfullscreen></iframe>
    </div>
      </main>

      <script src="MotW.js"></script>
      <script src="server.js"></script>
      <script src="movies.js"></script>
    </body>
</html>

//use the javascript version of math.random to choose the movie of the week. each entry in db has a unique var to them (like an id) and we use that as a means to
// choosing the movie 