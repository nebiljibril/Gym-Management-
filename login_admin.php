<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitness Club Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .error-message {
            color: #ff0000;
            text-align: center;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="home" id="home">
        <div class="container">
        </div>
    </div>

    <div id="popupForm" class="popup">
        <form class="popup-content" onsubmit="return validateAdminLogin(event)">
            <h2>Admin Login</h2>
            <input type="text" id="login_username" placeholder="username" name="login_username" required>
            <input type="password" id="login_password" placeholder="password" name="login_password" required>
            <button type="submit">Login</button>
            <div id="errorMessage" class="error-message">Invalid username or password</div>
            <br>
            <a href="index.php">Go back</a>
        </form>
    </div>

    <script>
        function validateAdminLogin(event) {
            event.preventDefault();
            
            const defaultUsername = "admin";
            const defaultPassword = "admin123";
            
            const username = document.getElementById('login_username').value;
            const password = document.getElementById('login_password').value;
            const errorMessage = document.getElementById('errorMessage');
            
            if (username === defaultUsername && password === defaultPassword) {
                errorMessage.style.display = 'none';
                window.location.href = 'admin.php';
                return true;
            } else {
                errorMessage.style.display = 'block';
                return false;
            }
        }
    </script>
</body>
</html>
