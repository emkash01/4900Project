<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0" />
    <link rel="stylesheet" href="assets/css/loginsheet.css" />
    <!--Name of css file-->
    <title>Register</title>
  </head>

  <body>
   


    <div class="form-box register"> 
        <h2>Registration</h2>
        <form id="register-form">
            <div class="input-box" style="padding-bottom: 10px;" >
                <!-- <ion-icon name="person"></ion-icon> -->
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
                <p>Already have an account? Get in Here! <a href="LoginMain.html" class="login-link">Log In!</a></p>
            </div>
        </form>
    </div>
    <div class="wrapper">
      <span class="icon-close">
        <ion-icon name="close"></ion-icon>
        <!-- does not work for "close-circle-sharp"-->
      </span>
    </div>

    <script>
    

      document
        .getElementById("register-form")
        .addEventListener("submit", async function (event) {
          event.preventDefault(); // Prevent default form submission

          const username = document.getElementById("username").value;
          const email = document.getElementById("email").value;
          const password = document.getElementById("password").value;

          try {
            const response = await fetch("http://localhost:3000/signup", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({ username, email, password }),
            });

            const data = await response.json();

            if (response.ok) {
              alert("User signed up successfully");
              window.location.href = "LoginMain.html";

              // Redirect to login page or perform other actions upon successful signup
            } else {
              alert(data.error || "Error signing up");
            }
          } catch (error) {
            console.error("Error signing up:", error);
            alert("Internal server error");
          }
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
