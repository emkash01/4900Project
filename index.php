<?php
require 'helpers/logged-in.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0"/>
    <link rel="stylesheet" href="assets/css/loginsheet.css"/>
    <!--Name of css file-->
    <title>TrailerFlix</title>
</head>

<body>
<header>
    <hs class="logo">Logo</hs>
    <nav class="navigation">
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Contact</a>

        <a href="LoginMain.php">

            <button class="btnLogin-popup">Log In</button>
        </a>
    </nav>
</header>


<div class="wrapper">
      <span class="icon-close">
        <ion-icon name="close"></ion-icon>
          <!-- does not work for "close-circle-sharp"-->
      </span>
</div>


<script src="assets/js/loginscript.js"></script>
<!--Name of jscript file-->
<script
        type="module"
        src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
></script>
<script
        nomodule
        src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
></script>
<!--Ionic Ions framework for icons and buttons-->
</body>
</html>
