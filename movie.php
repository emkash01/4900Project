<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method = "post">
        <label> Search </LABEL>
        <input type = "text" name = "search">
        <input type = "submit" name = "submit">
     
    </form>

</body>
</html>

<?php
$con = new PDO("postgresql: host=localhost;dbname=dbSetup", 'root', ''); //dont know how to do this (Look at line below)
//php > pg_connect("host=localhost dbname=edb user=enterprisedb password=postgres");  is a copy paste of when I attempted to connect via pgsql instead of mysql but it didnt work when modified to our code


if(isset($_post["submit"])){
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM 'search' WHERE title = '$str'");
    
    $sth -> setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $stg ->fetch()){
        ?>
        <br> <br> <br>
        <table> 
            <tr> 
                <th> Name </th> 
                <th> DEscription </th>
            </tr>
            <tr>
                <td> <?php echo $row -> Name; ?> </td>
                <td> <?php echo $row -> DEscription; ?> </td>
    </tr>
        </table>
        <?php
    }

        else{
            echo "Title Does not Exist"
        }
}
?>