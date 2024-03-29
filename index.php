<?php
require 'C:\Users\Artur.S\OneDrive\Documents\GitHub\4900Project\HTMLs';
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP PostgreSQL Example</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <nav class = "navbar">
        <ul >
          <li><img src = "ProjLogo.png" class = "logo"> </li>
          <li><a href = "./homepage.html">Movies</a></li>
          <li><a href = "./shows.html">Shows</a></li>
          <li><a href = "./Mylist.html">MyList</a></li>
          <li><a href = "./MotW.html">Movie of the Week</a></li>
          <li><a href = "./Rating.html">Rating</a></li>
          <div class="search">
              <input type="text" class = "searchBar" placeholder="Search..">
              <button type="submit" class = "submitButton">🔍</button>
          </div>
        </ul>
      </nav>
    <h1>User List</h1>

    <?php
    // PostgreSQL connection parameters
    $host = "localhost";
    $port = "5432";
    $dbname = "4900proj";
    $user = "postgres";
    $password = "Artur7799";

    // Connect to PostgreSQL
    //$db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    //$db = pg_connect("host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    // Query to select all users
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
    $query = $db->query("SELECT * FROM movie");

    // Display users in a table
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
            </tr>";

    // Fetch and display each row
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $image = $row['pic'];
        $imageData = base64_decode(file_get_contents($image));
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$image}</td>
                <td>{$row['title']}</td>
            </tr>";
    }

    echo "</table>";

    // Close the database connection
    $db = null;
    ?>

</body>
</html>
