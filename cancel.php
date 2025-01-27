<?php
include("insert.php");

function updateStatus($username, $status) {
    global $mysqli;
    $username = $mysqli->real_escape_string($username);
    $status = $mysqli->real_escape_string($status);

    // Update status in the database
    $sql = "UPDATE account SET role='$status' WHERE username='$username'";
    if ($mysqli->query($sql) !== TRUE) {
        echo "Error updating status: " . $mysqli->error;
    } 
}

function handleMembershipCancellation($username) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel_membership'])) {
        updateStatus($username, 'user');
    }
}

function handleLogin() {
    global $mysqli;
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

            if ($role == 'user') {
                $mysqli->close();
                header('Location: user.php');
                exit();
            } elseif ($role == 'member') {
                handleMembershipCancellation($username);
                $mysqli->close();
                header("Location: user.php");
                exit();
            } elseif ($role == 'admin') {
                $mysqli->close();
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
    return $login_failed;
}

$login_failed = handleLogin();
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
            <input type="hidden" name="username" value="<?php echo isset($_POST['login_username']) ? htmlspecialchars($_POST['login_username']) : ''; ?>">
            <button type="submit" name="cancel_membership">Cancel</button>
            <br>
            <a href="member.php">Go back</a>
        </form>
    </div>

    <script>
        window.onload = function() {
            var loginFailed = <?php echo json_encode($login_failed); ?>;
            if (loginFailed) {
                alert("Please check your username and password.");
            }
        }
    </script>
</body>
</html>
