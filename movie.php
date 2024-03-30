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
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        $key = '';
        $query = '';
        $result = '';
        $rows = '';
        if(isset($_POST['submit'])){
            $key = $_POST['key'];
            $query = $db->query("SELECT * FROM movie WHERE title LIKE :keyword OR actor LIKE :keyword");
            $query->bindValue(':keyword','%'.$key.'%', PDO::PARAM_STR);
            $query->execute();
            //$result = $query->fetchAll();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $rows = $query->rowCount();
        }
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
          <li><img src = "HTMLs/ProjLogo.png" class = "logo"> </li>
          <li><a href = "./homepage.html">Movies</a></li>
          <li><a href = "./shows.html">Shows</a></li>
          <li><a href = "./Mylist.html">MyList</a></li>
          <li><a href = "./MotW.html">Movie of the Week</a></li>
          <li><a href = "./Rating.html">Rating</a></li>
          <div class="search">
              <input type="text" class = "searchBar" placeholder="Search.."name="key">
              <button type="submit" class = "submitButton" name="submit">🔍</button>
          </div>
        </ul>
      </nav>
    <h1>User List</h1>
    <div class="container">
    <?php
    if(!empty($rows)){
        echo'hi';
    }
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['pic']}</td>
                <td>{$row['title']}</td>
            </tr>";
    }
    ?>
    </div>
</body>
</html>