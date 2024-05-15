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
    <title>Register</title>
</head>

<body>


<div class="form-box register">
    <h2>Registration</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='text-align: center; margin-top: 0.5rem; color: red'>Invalid email address</p>";
        } elseif (empty($username) || empty($password)) {
            echo "<p style='text-align: center; margin-top: 0.5rem; color: red'>Username and Password are required</p>";
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);
            try {
                if ($stmt->execute()) {
                    echo "<p style='text-align: center; margin-top: 0.5rem; color: red'>Registration successful</p>";
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['user'] = [ 'id' => $pdo->lastInsertId(), 'username' => $username, 'email' => $email];
                    header("Location: movies.php");
                    exit;
                } else {
                    echo "<p style='text-align: center; margin-top: 0.5rem; color: red'>Failed to register user</p>";
                }
            } catch (PDOException $e) {
                if ($e->getCode() == 23505) {
                    echo "<p style='text-align: center; margin-top: 0.5rem; color: red'>This email is already registered</p>";
                } else {
                    echo "<p style='text-align: center; margin-top: 0.5rem; color: red'>Error: " . $e->getMessage() . "</p>";
                }
            }
        }
    }
    ?>

    <form method="post">
        <div class="input-box" style="padding-bottom: 10px;">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>" required>
            <label>Username</label>
        </div>

        <div class="input-box">
            <span class="icon"><ion-icon name="mail-sharp"></ion-icon></span>
            <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required>
            <label>Email</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-sharp"></ion-icon></span>
            <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" required>
            <label>Password</label>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox"> I agree to the terms and conditions</label>
        </div>
        <button type="submit" class="btn">Register</button>
        <div class="login-register">
            <p>Already have an account? Get in Here! <a href="LoginMain.php" class="login-link">Log In!</a></p>
        </div>
    </form>
</div>
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
