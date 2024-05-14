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
                    body: JSON.stringify({email, password}),
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
                    body: JSON.stringify({username, email, password}),
                });

                const data = await response.json();

                if (response.ok) {
                    alert("User signed up successfully");
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
