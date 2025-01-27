<?php
include("insert.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve'])) {
        updateStatus($_POST['requestno'], 'approved');
    } elseif (isset($_POST['disapprove'])) {
        updateStatus($_POST['requestno'], 'disapproved');
    }
}

function updateStatus($requestno, $status) {
    global $mysqli;
    $requestno = $mysqli->real_escape_string($requestno);
    $status = $mysqli->real_escape_string($status);

    $sql = "UPDATE memberrequest SET status='$status' WHERE requestno='$requestno'";
    if ($mysqli->query($sql) !== TRUE) {
        echo "Error updating status: " . $mysqli->error;
        return;
    } 

    $sql = "SELECT username FROM memberrequest WHERE requestno='$requestno'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        
        $new_role = ($status === 'approved') ? 'member' : 'user';
        $sql = "UPDATE account SET role='$new_role' WHERE username='$username'";
        if ($mysqli->query($sql) !== TRUE) {
            echo "Error updating role: " . $mysqli->error;
        }
    }
}

$sql = "SELECT requestno, fname, lname, accno,  email, status, tier, username FROM memberrequest";$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitness Club | ፊትነስ ክለብ</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .lang-switch {
            position: absolute;
            top: 20px;
            right: 100px;
            z-index: 1000;
        }
        .lang-btn {
            padding: 4px 8px; /* Reduced padding */
            background:rgb(0, 0, 0);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            font-size: 12px; /* Reduced font size */
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="lang-switch">
        <button id="langToggle" class="lang-btn">EN | አማ</button>
    </div>
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="#">
                    <span class="en">Fitness <span>Club</span> <span class="logged">Logged in</span></span>
                    <span class="am hidden">ፊትነስ <span>ክለብ</span> <span class="logged">ገብተዋል</span></span>
                </a>
            </div>
            <a href="javascript:void(0)" class="ham-burger" id="ham-burger">
                <span></span>
                <span></span>
            </a>
            <div class="nav" id="nav">
                <ul>
                    <li><a href="admin.php">
                        <span class="en">Home</span>
                        <span class="am hidden">መነሻ</span>
                    </a></li>
                    <li><a href="index.php">
                        <span class="en">Log out</span>
                        <span class="am hidden">ውጣ</span>
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Start Schedule -->
    <div class="schedule" id="schedule">
        <div class="container">
            <div class="content">
                <div class="box text">
                    <div class="buttons2">
                        <form method="post" action="">
                            <input type="text" name="requestno" placeholder="Request NO | ጥያቄ ቁጥር" class="admin_input">
                            <br><br>
                            <input class="btn" type="submit" name="approve" value="Approve | አጽድቅ">
                            <input class="btn" type="submit" name="disapprove" value="Disapprove | አትጽድቅ">
                        </form>
                    </div>
                </div>
                <div class="box timing">
                    <table class="table" id="data-table">
                        <thead>
                            <tr>
                                <th><span class="en">request no</span><span class="am hidden">ጥያቄ ቁጥር</span></th>
                                <th><span class="en">fname</span><span class="am hidden">የመጀመሪያ ስም</span></th>
                                <th><span class="en">lname</span><span class="am hidden">የአባት ስም</span></th>
                                <th><span class="en">accno</span><span class="am hidden">አካውንት ቁጥር</span></th>
                                <th><span class="en">email</span><span class="am hidden">ኢሜል</span></th>
                                <th><span class="en">status</span><span class="am hidden">ሁኔታ</span></th>
                                <th><span class="en">tier</span><span class="am hidden">ደረጃ</span></th>
                                <th><span class="en">username</span><span class="am hidden">የተጠቃሚ ስም</span></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td class='day'>" . $row["requestno"]. "</td>
                                        <td>" . $row["fname"]. "</td>
                                        <td>" . $row["lname"]. "</td>
                                        <td>" . $row["accno"]. "</td>
                                        <td>" . $row["email"]. "</td>
                                        <td>" . $row["status"]. "</td>
                                        <td>" . $row["tier"]. "</td>
                                        <td>" . $row["username"]. "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'><span class='en'>No records found</span><span class='am hidden'>ምንም መዝገቦች አልተገኙም</span></td></tr>";
                        }
                        $mysqli->close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Schedule -->

    <!-- Start Contact -->
    <div class="about" id="about">
        <div class="container">
            <div class="content">
                <div class="box text">
                    <h2>
                        <span class="en">Get Connected with FITNESS CLUB</span>
                        <span class="am hidden">ከፊትነስ ክለብ ጋር ይገናኙ</span>
                    </h2>
                    <p class="title-p">
                        <span class="en">Our fitness club boasts of the highest quality equipments, services, classes and offers. Once you join our growing community of members, you will achieve your goals with our never relenting support, care and guidance.</span>
                        <span class="am hidden">የእኛ የአካል ብቃት ክለብ ከፍተኛ ጥራት ያላቸው መሣሪያዎች፣ አገልግሎቶች፣ ክፍሎች እና ቅናሾችን ያቀርባል። ከእኛ ጋር በመቀላቀል የሚፈልጉትን ግቦች በማሳካት እንዲረዱዎት እንቀጥላለን።</span>
                    </p>
                    <div class="info">
                        <ul>
                            <li>
                                <span class="fa fa-map-marker"></span>
                                <span class="en">Dire Dawa, in front of DDU University main gate.</span>
                                <span class="am hidden">ድሬዳዋ፣ የድሬዳዋ ዩኒቨርሲቲ ዋና በር ፊት ለፊት</span>
                            </li>
                            <li>
                                <span class="fa fa-phone"></span>
                                <span class="en">Phone: 0911111111</span>
                                <span class="am hidden">ስልክ: 0911111111</span>
                            </li>
                            <li>
                                <span class="fa fa-envelope"></span>
                                <span class="en">Email: gym@gym.com</span>
                                <span class="am hidden">ኢሜይል: gym@gym.com</span>
                            </li>
                        </ul>
                    </div>
                    <div class="copy">
                        <span class="en">Powered By &copy; CS group 8</span>
                        <span class="am hidden">በ CS ቡድን 8 የተዘጋጀ &copy;</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
    <script>
        document.getElementById('ham-burger').addEventListener('click', function() {
            this.classList.toggle('active');
            document.getElementById('nav').classList.toggle('open');
        });

        document.getElementById('langToggle').addEventListener('click', function() {
            const enElements = document.querySelectorAll('.en');
            const amElements = document.querySelectorAll('.am');
            
            enElements.forEach(el => el.classList.toggle('hidden'));
            amElements.forEach(el => el.classList.toggle('hidden'));
            
            this.textContent = this.textContent.includes('EN') ? 'አማ | EN' : 'EN | አማ';
        });

        document.getElementById('search-input').addEventListener('input', function() {
            let filter = this.value.toUpperCase();
            let table = document.getElementById('data-table');
            let tr = table.getElementsByTagName('tr');
            
            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName('td')[0];
                if (td) {
                    let txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }       
            }
        });
    </script>
</body>
</html>