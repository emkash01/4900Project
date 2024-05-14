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
              <li><a href = "Rating.php">Rating</a></li>
              <form method="post" class="search">
                  <input type="text" name="search" value="<?= $_POST['search'] ?? '' ?>" class="searchBar" placeholder="Search..">
                  <button type="submit" class="submitButton">🔍</button>
              </form>
          </ul>
      </nav>
    <main>
        <h1>Shows</h1> 
    </main>
  </body>
</html>