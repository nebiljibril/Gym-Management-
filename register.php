<?php
include("insert.php");

$duplicate_username = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'], $_POST['username'], $_POST['password'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // Check if the username already exists
    $check_query = "SELECT * FROM account WHERE username = ?";
    $stmt = $mysqli->prepare($check_query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $chezck_result = $stmt->get_result();

    if ($check_result && $check_result->num_rows > 0) {
        $duplicate_username = true;
    } else {
        // Insert new user
        $query = "INSERT INTO account (username, password, email, role) VALUES (?, ?, ?, 'user')";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('sss', $username, $password, $email);
        $result = $stmt->execute();

        if ($result) {
            header("Location: reg_success.html");
            exit();
        } else {
            header("Location: reg_failed.html");
            exit();
        }
    }
    $stmt->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitness Club</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="home" id="home">
    </div>

    <div id="popupFormReg" class="popup">
        <form class="popup-content" id="registerForm" action="" method="post" onsubmit="return validateForm()">
            <h2>Register</h2>
            <input type="email" id="emailReg" placeholder="e-mail" name="email" required>
            <input type="text" id="nameReg" placeholder="username" name="username" required>
            <input type="password" id="passwordReg" placeholder="password" name="password" required>
            <button type="submit">Register</button>
            <a href="index.php" id="register">Go back</a> 
        </form>
    </div>
    <script>
        function validateForm() {
            var email = document.getElementById("emailReg").value;
            var username = document.getElementById("nameReg").value;
            var password = document.getElementById("passwordReg").value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var usernameRegex = /^[a-zA-Z_][a-zA-Z0-9_]*$/;
            var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

            var isValid = true;
            var errorMessage = "";

            if (!emailRegex.test(email)) {
                errorMessage += "Invalid email address\n";
                isValid = false;
            }

            if (!usernameRegex.test(username)) {
                errorMessage += "Invalid username. It must start with a letter or underscore and can only contain letters, numbers, and underscores.\n";
                isValid = false;
            }

            if (!passwordRegex.test(password)) {
                errorMessage += "Invalid password. It must be at least 8 characters long and contain at least one letter and one number.\n";
                isValid = false;
            }

            if (!isValid) {
                alert(errorMessage);
            }

            return isValid;
        }

        window.onload = function() {
            var regFailed = <?php echo json_encode($duplicate_username); ?>;
            if (regFailed) {
                alert("Username taken! Please, try another one.");
            }
        }
    </script>
</body>
</html>
