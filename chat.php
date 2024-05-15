<?php
    require 'helpers/authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat</title>
    <link rel="stylesheet" href="assets/css/chat.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    
  </head>
  <body>
    <nav class="navbar">
      <ul>
      <li><img src="assets/images/ProjLogo.png" class="logo"/></li>
        <li><a href="movies.php">Movies</a></li>
        <li><a href="shows.php">Shows</a></li>
        <li><a href="Mylist.php">MyList</a></li>
        <li><a href="MotW.php">Movie of the Week</a></li>
        <li><a href="Rating.php">Live Chat</a></li>
        <li><a href="helpers/logout.php">Logout</a></li>
        <div class="search">
          <input type="text" placeholder="Search.." />
          <button type="submit" class="submitButton">🔍</button>
        </div>
      </ul>
    </nav>
    <div class="welcom-text">Welcome to Chat Rooms!</div>

    <div class="chat-main" id="chatMain" style="padding-bottom: 100px"></div>
    <div class="input-main">
      <div class="input-div" style="margin-top: 20px">
        <input
          class="color-input"
          type="text"
          placeholder="Enter your Text Here"
          name=""
          id=""
          style="
            color: white;
            width: 100%;
            background-color: grey;
            padding: 10px;
          "
        />
      </div>
      <div class="send-text"><img src="images/images.png" alt=""  style="width: 20px; height: 20px;" ></ion-icon></div>
    </div >
    <div style="width: 90%; height: 10px; background-color: black; margin: auto; margin-top: 50px; border-radius: 20px; ">
      
    </div>
    <div class="cont-text">
Contact us ,faq, etc.
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const sendTextButton = document.querySelector(".send-text");
        const inputField = document.querySelector(".color-input");

        sendTextButton.addEventListener("click", async () => {
          const message = inputField.value.trim();

          if (message === "") {
            alert("Please enter a message");
            return;
          }

          // Get user ID from local storage
          const user = JSON.parse(localStorage.getItem("user"));
          if (!user || !user.id) {
            alert("User not logged in");
            return;
          }

          const user_id = user.id;

          try {
            const response = await fetch("http://localhost:3000/send-message", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({ user_id, message }),
            });

            const data = await response.json();

            if (response.ok) {
              // If message is sent successfully, show success message
              // alert(data.message);
              console.log(data.messageDetails); // This will contain the details of the message sent
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

      document.addEventListener("DOMContentLoaded", async () => {
    const chatMain = document.getElementById("chatMain");

    // Function to fetch messages from the API
    async function fetchMessages() {
        try {
            const response = await fetch("http://localhost:3000/get-messages");
            const data = await response.json();

            if (response.ok) {
                // Clear the existing messages before appending new ones
                chatMain.innerHTML = "";

                // If messages are retrieved successfully, display them
                data.messages.forEach((message) => {
                    const messageDiv = document.createElement("div");
                    messageDiv.classList.add("user1");

                    const mainUser = document.createElement("div");
                    mainUser.classList.add("main-user");

                    const userIcon = document.createElement("div"); // Create an icon element
                    userIcon.classList.add("personlogo"); // Add class for person logo

                    const contentDiv = document.createElement("div");
                    contentDiv.classList.add("content");

                    const usernameDiv = document.createElement("div");
                    usernameDiv.classList.add("UserName1");
                    usernameDiv.textContent = message.username;

                    const textDiv = document.createElement("div");
                    textDiv.classList.add("text-class");
                    textDiv.textContent = message.message;

                    contentDiv.appendChild(usernameDiv);
                    contentDiv.appendChild(textDiv);

                    mainUser.appendChild(userIcon);
                    mainUser.appendChild(contentDiv);

                    messageDiv.appendChild(mainUser);

                    chatMain.appendChild(messageDiv);
                });
            } else {
                // If there's an error, show error message
                console.error("Error:", data.error);
            }
        } catch (error) {
            console.error("Error:", error);
        }
    }


    setInterval(fetchMessages, 1000);
});

    </script>
  </body>
</html>
