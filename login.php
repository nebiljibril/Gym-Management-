<?php
include("insert.php");

$login_failed = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_username'], $_POST['login_password'])) {
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    $query = "SELECT * FROM account WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if ($row && password_verify($password, $row['password'])) {
        $role = $row['role'];
        $mysqli->close();

        if ($role == 'user') {
            header('Location: user.php');
            exit();
        } elseif ($role == 'member') {
            header('Location: member.php');
            exit();
        } elseif ($role == 'admin') {
            header('Location: admin.php');
            exit();
        } else {
            $login_failed = true;
        }
    } else {
        $login_failed = true;
    }
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
        <div class="container">
        </div>
    </div>

    <div id="popupForm" class="popup">
        <form class="popup-content" action="" method="post">
            <h2>Login</h2>
            <input type="text" id="login_username" placeholder="username" name="login_username" required>
            <input type="password" id="login_password" placeholder="password" name="login_password" required>
            <button type="submit">Login</button>
            <br>
            <a href="register.php">New? Register</a>
            <br>
            <a href="index.php">Go back</a>
        </form>
    </div>

    <script>
        window.onload = function() {
            var loginFailed = <?php echo json_encode($login_failed); ?>;
            if (loginFailed) {
                alert("Login failed. Please check your username and password.");
            }
        }
    </script>
</body>
</html>
