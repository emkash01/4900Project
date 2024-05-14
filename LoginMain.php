<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0" />
    <link rel="stylesheet" href="assets/css/loginsheet.css" />
    <!--Name of css file-->
    <title>Login</title>
  </head>

  <body>
 
    <div class="form-box login">
      <h2>Log In</h2>
      <form action="#">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail-sharp"></ion-icon></span>
          <input type="email" required />
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"
            ><ion-icon name="lock-closed-sharp"></ion-icon
          ></span>
          <input type="password" required />
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

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const loginForm = document.querySelector(".form-box.login form");

        loginForm.addEventListener("submit", async (e) => {
          e.preventDefault(); // Prevent the default form submission

          const email = loginForm.querySelector('input[type="email"]').value;
          const password = loginForm.querySelector(
            'input[type="password"]'
          ).value;

          try {
            const response = await fetch("http://localhost:3000/login", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({ email, password }),
            });

            const data = await response.json();

            if (response.ok) {
              // If login is successful, show success message
              alert(data.message);
              localStorage.setItem("user", JSON.stringify(data.user));

              // Redirect to some other page after successful login
              window.location.href = "chat.html";
              console.log(data.user); // This will contain the user object returned from the server
            } else {
              // If there's an error, show error message
              alert(data.error);
            }
          } catch (error) {
            console.error("Error:", error);
            alert("An error occurred. Please try again later.");
          }
        });
      });

     
    </script>

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
