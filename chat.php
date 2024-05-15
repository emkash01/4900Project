<?php
require 'helpers/authentication.php';
require 'database/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat</title>
    <link rel="stylesheet" href="assets/css/chat.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

<!--    <link href="../assets/css/bootstrap-5.3.0.min.css" rel="stylesheet">-->
      <!-- Font Awesome for ellipsis icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/chat-style.css">
    
  </head>
  <body>
    <nav class="navbar">
      <ul>
      <li><img src="assets/images/ProjLogo.png" class="logo"/></li>
        <li><a href="movies.php">Movies</a></li>
        <li><a href="shows.php">Shows</a></li>
        <li><a href="Mylist.php">MyList</a></li>
        <li><a href="MotW.php">Movie of the Week</a></li>
        <li><a href="chat.php">Rating</a></li>
        <li><a href="helpers/logout.php">Logout</a></li>
        <div class="search">
          <input type="text" placeholder="Search.." />
          <button type="submit" class="submitButton">🔍</button>
        </div>
      </ul>
    </nav>
    <div class="welcom-text">Welcome to Chat Rooms!</div>

    <div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">

        <?php
        $sql = "SELECT * FROM users WHERE id != :id ORDER BY id asc;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) > 0) {
            ?>

            <div class="chat-container clearfix">
                <div class="people-list" id="people-list">
                    <ul class="list">
                        <?php
                        foreach ($rows as $row) {
                            ?>
                            <li class="clearfix">
                                <div class="about">
                                    <div class="name" id="chatHistoryUser" data-id="<?php echo $row['id'] ?>" ><?php echo $row['username'] ?></div>
                                    <div class="status">
                                        <i class="fa fa-circle online"></i> online
                                    </div>
                                </div>
                            </li>
                            <hr/>
                        <?php }
                        ?>
                    </ul>
                </div>

                <div class="chat">

                    <div class="chat-header clearfix">
                        <div class="chat-about">
                            <div class="chat-with">Chat with Other People</div>
                        </div>
                    </div>

                    <div class="chat-history">
                        <ul id="chatHistoryContainer">

                        </ul>
                    </div> <!-- end chat-history -->

                    <div class="chat-message clearfix">
                        <textarea name="message-to-send" id="chatMessageInput" placeholder="Type your message"
                                  rows="3"></textarea>

                        <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
                        <i class="fa fa-file-image-o"></i>

                        <button id="sendChatMessageBtn">Send</button>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

    <script src="assets/js/chat.js"></script>

    <script>
//       document.addEventListener("DOMContentLoaded", () => {
//         const sendTextButton = document.querySelector(".send-text");
//         const inputField = document.querySelector(".color-input");
//
//         sendTextButton.addEventListener("click", async () => {
//           const message = inputField.value.trim();
//
//           if (message === "") {
//             alert("Please enter a message");
//             return;
//           }
//
//           // Get user ID from local storage
//           const user = JSON.parse(localStorage.getItem("user"));
//           if (!user || !user.id) {
//             alert("User not logged in");
//             return;
//           }
//
//           const user_id = user.id;
//
//           try {
//             const response = await fetch("http://localhost:3000/send-message", {
//               method: "POST",
//               headers: {
//                 "Content-Type": "application/json",
//               },
//               body: JSON.stringify({ user_id, message }),
//             });
//
//             const data = await response.json();
//
//             if (response.ok) {
//               // If message is sent successfully, show success message
//               // alert(data.message);
//               console.log(data.messageDetails); // This will contain the details of the message sent
//             } else {
//               // If there's an error, show error message
//               alert(data.error);
//             }
//           } catch (error) {
//             console.error("Error:", error);
//             alert("An error occurred. Please try again later.");
//           }
//         });
//       });
//
//       document.addEventListener("DOMContentLoaded", async () => {
//     const chatMain = document.getElementById("chatMain");
//
//     // Function to fetch messages from the API
//     async function fetchMessages() {
//         try {
//             const response = await fetch("http://localhost:3000/get-messages");
//             const data = await response.json();
//
//             if (response.ok) {
//                 // Clear the existing messages before appending new ones
//                 chatMain.innerHTML = "";
//
//                 // If messages are retrieved successfully, display them
//                 data.messages.forEach((message) => {
//                     const messageDiv = document.createElement("div");
//                     messageDiv.classList.add("user1");
//
//                     const mainUser = document.createElement("div");
//                     mainUser.classList.add("main-user");
//
//                     const userIcon = document.createElement("div"); // Create an icon element
//                     userIcon.classList.add("personlogo"); // Add class for person logo
//
//                     const contentDiv = document.createElement("div");
//                     contentDiv.classList.add("content");
//
//                     const usernameDiv = document.createElement("div");
//                     usernameDiv.classList.add("UserName1");
//                     usernameDiv.textContent = message.username;
//
//                     const textDiv = document.createElement("div");
//                     textDiv.classList.add("text-class");
//                     textDiv.textContent = message.message;
//
//                     contentDiv.appendChild(usernameDiv);
//                     contentDiv.appendChild(textDiv);
//
//                     mainUser.appendChild(userIcon);
//                     mainUser.appendChild(contentDiv);
//
//                     messageDiv.appendChild(mainUser);
//
//                     chatMain.appendChild(messageDiv);
//                 });
//             } else {
//                 // If there's an error, show error message
//                 console.error("Error:", data.error);
//             }
//         } catch (error) {
//             console.error("Error:", error);
//         }
//     }
//
//
//     setInterval(fetchMessages, 1000);
// });

    </script>
  </body>
</html>
