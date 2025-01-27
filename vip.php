<?php
include("insert.php");

$fail = false;
$username_not_exist = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fname'], $_POST['lname'], $_POST['accno'], $_POST['email'], $_POST['username'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $accno = $_POST['accno'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $query = "SELECT username FROM account WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $username_not_exist = true;
    } else {
        $stmt->close();
        $data = [$accno, $fname, $lname, $email, $username];
        $query = "INSERT INTO memberrequest (accno, fname, lname, email, username, status, tier) VALUES (?, ?, ?, ?, ?, 'pending', 'vip')";
        $result = executeQuery($mysqli, $query, $data);

        if (!$result) {
            $fail = true;
        } else {
            header("location: member_sub.html");
            exit();
        }
    }

    $stmt->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <main>
        <section class="banner">
            <p>Transfer the payment to our CBE account: 1000303080639</p>
            <h3>Includes: </h3>
            <p>Free WiFi</p>
            <p>Month to Month</p>
            <p>No time limits</p>
            <p>Everyday of the week</p>
            <p>Service Locker Rooms</p> 
            <h3>3000 BIRR</h3> 
        </section>

        <section class="side">
            <div class="cta">
                <p><span>Get Membership</span> vip</p>
            </div>

            <div class="sign-up">
                <form id="signupForm" class="signup-form" action="" method="post" onsubmit="return validateForm()">
                    <div class="form-btn">
                        <input type="text" id="fname" placeholder="First Name" name="fname" required>
                    </div>

                    <div class="form-btn">
                        <input type="text" id="lname" placeholder="Last Name" name="lname" required>
                    </div>

                    <div class="form-btn">
                        <input type="text" id="accno" placeholder="Your AccNO" name="accno" required>
                    </div>

                    <div class="form-btn">
                        <input type="email" id="email" placeholder="Email" name="email" required>
                    </div>

                    <div class="form-btn">
                        <input type="text" id="username" placeholder="Username" name="username" required>
                    </div>

                    <input id="submit-btn" type="submit" value="Get Membership">

                    <p class="terms">Your request to get a membership will be assessed by our admins</p>
                </form>
            </div>
        </section>
    </main>
    <script>
        window.onload = function() {
            var fail = <?php echo json_encode($fail); ?>;
            var usernameNotExist = <?php echo json_encode($username_not_exist); ?>;
            if (fail) {
                alert("Sorry, something went wrong on our side.");
            }
            if (usernameNotExist) {
                alert("Username does not exist.");
            }
        }

        function validateForm() {
            var emailValue = document.getElementById("email").value;
            var fnameValue = document.getElementById("fname").value;
            var lnameValue = document.getElementById("lname").value;
            var accnoValue = document.getElementById("accno").value;
            var usernameValue = document.getElementById("username").value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var fnameRegex = /^[a-zA-Z_][a-zA-Z0-9_]*$/;
            var lnameRegex = /^[a-zA-Z_][a-zA-Z0-9_]*$/;
            var accnoRegex = /^[0-9_]*$/;
            var usernameRegex = /^[a-zA-Z0-9_]+$/;

            var isValid = true;
            var errorMessage = "";

            if (!emailRegex.test(emailValue)) {
                errorMessage += "Invalid email address\n";
                isValid = false;
            }

            if (!fnameRegex.test(fnameValue)) {
                errorMessage += "Invalid first name. It must start with a letter or underscore and can only contain letters, numbers, and underscores.\n";
                isValid = false;
            }

            if (!lnameRegex.test(lnameValue)) {
                errorMessage += "Invalid last name. It must start with a letter or underscore and can only contain letters, numbers, and underscores.\n";
                isValid = false;
            }

            if (!accnoRegex.test(accnoValue)) {
                errorMessage += "Invalid account number. It must only include numbers\n";
                isValid = false;
            }

            if (!usernameRegex.test(usernameValue)) {
                errorMessage += "Invalid username. It can only contain letters, numbers, and underscores.\n";
                isValid = false;
            }

            if (!isValid) {
                alert(errorMessage);
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
