<?php
session_start();

$username = "";
$photo = "";

if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
    if(isset($_SESSION['user_photo'])) {
        $photo = $_SESSION['user_photo'];
    }
}

if (isset($_POST['logout'])) {
    
    $_SESSION = array();
    
    session_destroy();
 
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Zaytuna</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    
    <link href="../logo.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   
    <link href="../assets/css/style.css" rel="stylesheet">


    <style>
            #chatbot-button {
                position: fixed;
                bottom: 20px;
                left: 20px;
                z-index: 9999;
                background-color: #5c9f24; 
                color: #fff; 
                border: none; 
                border-radius: 5px; 
                padding: 10px 20px; 
                cursor: pointer; 
                outline: none; 
            }

            #chatbot-button:hover {
                background-color: #4b8020;
            }

            .chatbot-window {
    display: none;
    position: fixed;
    bottom: 60px;
    left: 20px; 
    width: 300px;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.chatbot-messages {
    height: 300px; /* Adjust as needed */
    overflow-y: auto;
    padding: 10px;
    display: flex;
    flex-direction: column; /* Changed to column */
}

.user-input-container {
    display: flex;
    align-items: center;
    padding: 10px;
    border-top: 1px solid #ccc;
}

.user-input {
    flex: 1;
    padding: 8px;
    border: none;
    border-radius: 20px;
    margin-right: 10px;
    outline: none;
}

.send-button {
    padding: 8px 20px;
    background-color: #5c9f24;
    color: #fff;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    outline: none;
}

.chatbot-message {
    background-color: #5c9f24;
    color: #fff;
    border-radius: 15px;
    padding: 10px;
    margin: 10px 20px;
    max-width: 70%;
}

.user-message {
    background-color: #e9e9e9;
    color: #333;
    border-radius: 15px;
    padding: 10px;
    margin: 10px 20px;
    max-width: 70%;
    align-self: flex-start; /* Align user messages to the left */
}


  


        .btn .btn-secondary{
            background-color: #5c9f24 ;
        }
        
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(218, 221, 6, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #loading-text {
            font-size: 24px;
        }

        #content {
            display: none;
        }
    </style>
</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="home.php" class="logo"><img src="../logo.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="home.php" class="nav-link scrollto ">Home</a></li>
                    <li><a href="about.php" class="nav-link scrollto">About</a></li>
                    <li><a class="nav-link scrollto" href="bookingView.php">Bookings</a></li>
                    <li><a class="nav-link scrollto " href="#">Shop</a></li>

                  
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if (!empty($photo)) { ?>
                                    <img src="../uploads/<?php echo $photo; ?>" alt="User Photo" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                <?php } ?>
                                <span class="ms-2 d-none d-lg-inline text-white"><?php echo $username; ?></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><form id="logoutForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <button class="dropdown-item" type="submit" name="logout">Logout</button>
                                </form></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li><a href="login.php" class="getstarted scrollto" id="getstarted">Get Started</a></li>
                    <?php } ?>
                    
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>


    <div id="loading-screen">
        <p id="loading-text">Loading...</p>
    </div>

    
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <div class="d-flex align-items-center mb-3">
                        <?php if (!empty($photo)) { ?>
                            <img src="../uploads/<?php echo $photo; ?>" alt="User Photo" class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                        <?php } ?>
                        <div>
                            <h5 class="modal-title"><?php echo $username; ?></h5>
                            <p class="text-muted"><?php echo $_SESSION['user_email']; ?></p>
                        </div>
                    </div>
                    
                <?php } else { ?>
                    <p>User not logged in.</p>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<button id="chatbot-button" class="btn btn-primary">Chat with Bot</button>

<div id="chatbot-window" class="chatbot-window">
    <div id="chatbot-messages" class="chatbot-messages"></div>
    <div class="user-input-container">
        <input type="text" id="user-input" class="user-input" placeholder="Type a message...">
        <button id="send-button" class="send-button">Send</button>
    </div>
</div>




    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    const chatbotButton = document.getElementById('chatbot-button');
    const chatbotWindow = document.getElementById('chatbot-window');
    const userInput = document.getElementById('user-input');
    const sendButton = document.getElementById('send-button');
    const chatbotMessages = document.getElementById('chatbot-messages');

    let isOpen = false;

    chatbotButton.addEventListener('click', function() {
        isOpen = !isOpen;
        chatbotWindow.style.display = isOpen ? 'block' : 'none';
        chatbotButton.innerText = isOpen ? 'Close Chat' : 'Chat with Bot';
    });

    sendButton.addEventListener('click', function() {
        const userMessage = userInput.value.trim();
        if (userMessage !== '') {
            appendUserMessage(userMessage);
            userInput.value = '';

            
            sendMessageToBot(userMessage);
        }
    });

    function appendUserMessage(message) {
        const messageElement = document.createElement('div');
        messageElement.className = 'user-message';
        messageElement.innerText = message;
        chatbotMessages.appendChild(messageElement);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }

    function appendChatbotMessage(message) {
        const messageElement = document.createElement('div');
        messageElement.className = 'chatbot-message';
        messageElement.innerText = message;
        chatbotMessages.appendChild(messageElement);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }

    function sendMessageToBot(message) {
    const API_URL = "https://api.openai.com/v1/completions" ;
    const API_KEY = "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" ;
    fetch(API_URL, { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${API_KEY}` 
        },
        body: JSON.stringify({
            model: 'gbt-3.5-turbo', 
            prompt: message,
            max_tokens: 50 
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.choices && data.choices.length > 0) {
            const botResponse = data.choices[0].text.trim();
            appendChatbotMessage(botResponse);
        } else {
            appendChatbotMessage('Error: No response from the bot.');
        }
    })
    .catch(error => {
        console.error('Error sending message to bot:', error);
        appendChatbotMessage('Error: Failed to send message to the bot.');
    });
}




});


    </script>

    <script>
        
        window.addEventListener('load', function() {
            document.getElementById('loading-screen').style.display = 'none';

        });
    </script>

    
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    
    <script src="../assets/js/main.js"></script>
</body>

</html>
