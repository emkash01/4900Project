<!DOCTYPE html>
<html>
<head>
    <title>PHP PostgreSQL Example</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <nav class = "navbar">
        <ul >
          <li><img src = "HTMLs/ProjLogo.png" class = "logo"> </li>
          <li><a href = "./homepage.html">Movies</a></li>
          <li><a href = "./shows.html">Shows</a></li>
          <li><a href = "./Mylist.html">MyList</a></li>
          <li><a href = "./MotW.html">Movie of the Week</a></li>
          <li><a href = "./Rating.html">Rating</a></li>
          <form action="practice.php">
          <div class="search">
              <input type="text" class = "searchBar" placeholder="Search.."name="key">
              <button type="submit" class = "submitButton" name="submit">🔍</button>
          </di>
          </form>      
        </ul>
      </nav>
    <h1>User List</h1>
    <div class="container">
    <?php
    // PostgreSQL connection parameters
    $host = "localhost";
    $port = "5432";
    $dbname = "4900proj";
    $user = "postgres";
    $password = "Artur7799";

    //$stmt = "";
    function testdb_connect ($host, $port,$dbname, $user, $password){
        $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
        return $db;
    }
    
    try {
        $db = testdb_connect ($host, $port,$dbname, $user, $password);
        echo 'Connected to database';
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    //
    //$row = $query->fetch()
    if (isset($_POST['submit'])){
        $search = $_POST['key'];
        $query = $db->prepare("SELECT * FROM movie WHERE title = :title OR actor = :actor");
        //$query = $db->query("SELECT * FROM movie WHERE title = $search ");
        $query->execute(['title'=> $search, 'actor'=> $search]);
        //$query->bindParam(':title',$search,PDO::PARAM_STR);
        //$query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo 'Movie: ' . $row['title'] . ', Name: ' . $row['actor'] . "<br>\n";
            //echo 'Movie: '. $row['title'];
        }
    }
    ?>
    </div>
</body>
</html>