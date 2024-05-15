<?php
require 'helpers/logged-in.php';
require 'database/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0"/>
    <link rel="stylesheet" href="assets/css/loginsheet.css"/>
    <!--Name of css file-->
    <title>Login</title>
</head>

<body>

<div class="form-box login">
    <h2>Log In</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve data from POST
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='text-align: center; margin-top: 0.5rem; color: red'>Invalid email address</p>";
        } elseif (empty($password)) {
            echo "<p style='text-align: center; margin-top: 0.5rem; color: red'>Password is required</p>";
        } else {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user'] = [ 'id' => $user['id'], 'username' => $user['username'], 'email' => $user['email']];
                header("Location: movies.php");
                exit;
            } else {
                echo "<p style='text-align: center; margin-top: 0.5rem; color: red'>Invalid login credentials</p>";
            }
        }
    }
    ?>
    <form method="post">
        <div class="input-box">
            <span class="icon"><ion-icon name="mail-sharp"></ion-icon></span>
            <input name="email" type="email" value="<?= $_POST['email'] ?? '' ?>" required/>
            <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"
          ><ion-icon name="lock-closed-sharp"></ion-icon
              ></span>
            <input name="password" type="password" value="<?= $_POST['password'] ?? '' ?>" required/>
            <label>Password</label>
        </div>
        <!-- <div class="remember-forgot">
          <label><input type="checkbox" /> Remember Me for Later</label>
          <a href="#">Forgot Password?</a>
        </div> -->
        <button type="submit" class="btn">Log In</button>
        <div class="login-register">
            <p>
                Dont have an account? Make one Here:
                <a href="register.php" class="register-link">Register</a>
            </p>
        </div>
    </form>
</div>

<!-- <div class="form-box register">
    <h2>Registration</h2>
    <form id="register-form">
        <div class="input-box">
            <ion-icon name="person"></ion-icon>
            <input type="text" id="username" required>
            <label>Username</label>
        </div>

        <div class="input-box">
            <span class="icon"><ion-icon name="mail-sharp"></ion-icon></span>
            <input type="email" id="email" required>
            <label>Email</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-sharp"></ion-icon></span>
            <input type="password" id="password" required>
            <label>Password</label>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox"> I agree to the terms and conditions</label>
        </div>
        <button type="submit" class="btn">Register</button>
        <div class="login-register">
            <p>Already have an account? Get in Here! <a href="#" class="login-link">Log In!</a></p>
        </div>
    </form>
</div> -->
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
