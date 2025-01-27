<?php
include("insert.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_feedback'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    $name = $mysqli->real_escape_string($name);
    $email = $mysqli->real_escape_string($email);
    $message = $mysqli->real_escape_string($message);

    $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Feedback submitted successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
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
            padding: 4px 8px;
            background:rgb(0, 0, 0);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
			font-size: 12px;
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
                    <span class="en">DIRE MALL GYM</span>
                    <span class="am hidden">ዲሬ ሞል ጂም</span>
                </a>
            </div>
            <a href="javascript:void(0)" class="ham-burger" id="ham-burger">
                <span></span>
                <span></span>
            </a>
            <div class="nav" id="nav">
                <ul>
                    <li><a href="#home">
                        <span class="en">Home</span>
                        <span class="am hidden">መነሻ</span>
                    </a></li>
                    <li><a href="#contact">
                        <span class="en">About</span>
                        <span class="am hidden">ስለ እኛ</span>
                    </a></li>
                    <li><a href="#services">
                        <span class="en">Services</span>
                        <span class="am hidden">አገልግሎቶች</span>
                    </a></li>
                    <li><a href="#membership">
                        <span class="en">Memberships</span>
                        <span class="am hidden">አባልነት</span>
                    </a></li>
                    <li><a href="#schedule">
                        <span class="en">Schedule</span>
                        <span class="am hidden">የጊዜ ሰሌዳ</span>
                    </a></li>
                    <li><a href="#contact">
                        <span class="en">Contact</span>
                        <span class="am hidden">ያግኙን</span>
                    </a></li>
                    <li><a href="login.php" class="btn">
                        <span class="en">Log in</span>
                        <span class="am hidden">ግባ</span>
                    </a></li>
                    <li><a href="login_admin.php">
                        <span class="en">Admin</span>
                        <span class="am hidden">አስተዳዳሪ</span>
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="home" id="home">
        <div class="container">
            <h1>
                <span class="en">Acquire your <span>dream</span> physique</span>
                <span class="am hidden">የሚፈልጉትን <span>ቅርጽ</span> ያግኙ</span>
            </h1>
            <h1>
                <span class="en">Starting <span>today</span></span>
                <span class="am hidden">ከዛሬ <span>ጀምሮ</span></span>
            </h1>
            <div class="buttons">
                <a href="#membership" class="btn">
                    <span class="en">Membership</span>
                    <span class="am hidden">አባልነት</span>
                </a>
            </div>
        </div>
    </div>
    <div class="services" id="services">
        <div class="container">
            <div class="content">
                <div class="box">
                    <div class="inner">
                        <div class="img">
                            <img src="images/about1.jpg" alt="about" />
                        </div>
                        <div class="text">
                            <h4>
                                <span class="en">Free Consultation</span>
                                <span class="am hidden">ነጻ ምክር አገልግሎት</span>
                            </h4>
                            <p>
                                <span class="en">Get a complimentary consultation session with our experts. We'll discuss your fitness goals, assess your current fitness level, and provide recommendations to help you get started on your journey to a healthier lifestyle.</span>
                                <span class="am hidden">ከባለሙያዎቻችን ጋር ነጻ የምክር አገልግሎት ያግኙ። የእርስዎን የአካል ብቃት ግቦች እንወያያለን፣ የአሁኑን የአካል ብቃት ደረጃዎን እናጤናለን እና ጤናማ የሆነ የሕይወት ዘይቤ ለመጀመር እንዲረዱዎት ምክሮችን እንሰጣለን።</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="inner">
                        <div class="img">
                            <img src="images/about2.jpg" alt="about" />
                        </div>
                        <div class="text">
                            <h4>
                                <span class="en">Best Training</span>
                                <span class="am hidden">ምርጥ ስልጠና</span>
                            </h4>
                            <p>
                                <span class="en">Experience the best-in-class training programs tailored to your needs. Our team of certified trainers utilizes cutting-edge techniques and equipment to ensure you receive top-notch training.</span>
                                <span class="am hidden">ለፍላጎትዎ የተበጀ የከፍተኛ ደረጃ የስልጠና ፕሮግራሞችን ይሞክሩ። የተመሰከረላቸው አሰልጣኞች ቡድናችን ዘመናዊ ቴክኒኮችን እና መሳሪያዎችን በመጠቀም ጥራት ያለው ስልጠና እንዲያገኙ ያረጋግጣል።</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="inner">
                        <div class="img">
                            <img src="images/about3.jpg" alt="about" />
                        </div>
                        <div class="text">
                            <h4>
                                <span class="en">Build Perfect Body</span>
                                <span class="am hidden">ፍጹም አካል ይገንቡ</span>
                            </h4>
                            <p>
                                <span class="en">Transform your physique with our comprehensive body-building programs. Our expert trainers will guide you through personalized workouts and nutrition plans.</span>
                                <span class="am hidden">በሁለንተናዊ የሰውነት ግንባታ ፕሮግራሞቻችን የሰውነትዎን ቅርጽ ይቀይሩ። ባለሙያ አሰልጣኞቻችን የግል ልምምዶችን እና የአመጋገብ እቅዶችን በመምራት ይረዳዎታል።</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="price-package" id="membership">
        <div class="container">
            <h2>
                <span class="en">Choose Your Package</span>
                <span class="am hidden">የእርስዎን ፓኬጅ ይምረጡ</span>
            </h2>
            <p class="title-p">
                <span class="en">We offer various packages with varying prices. Take a look at the offers down below!</span>
                <span class="am hidden">የተለያዩ ዋጋዎች ያላቸውን የተለያዩ ፓኬጆችን እናቀርባለን። ከዚህ በታች ያሉትን ቅናሾች ይመልከቱ!</span>
            </p>
            <div class="content">
                <div class="box">
                    <div class="inner">
                        <div class="price-tag">2000 BIRR/Month | 2000 ብር/በወር</div>
                        <div class="img">
                            <img src="images/price1.jpg" alt="price" />
                        </div>
                        <div class="text">
                            <h3>
                                <span class="en">Body Building Training</span>
                                <span class="am hidden">የሰውነት ግንባታ ስልጠና</span>
                            </h3>
                            <p>
                                <span class="en">Get Free WiFi</span>
                                <span class="am hidden">ነጻ ዋይፋይ ያግኙ</span>
                            </p>
                            <p>
                                <span class="en">Month to Month</span>
                                <span class="am hidden">ከወር ወደ ወር</span>
                            </p>
                            <p>
                                <span class="en">3hrs per day</span>
                                <span class="am hidden">በቀን 3 ሰዓት</span>
                            </p>
                            <p>
                                <span class="en">3 days per week</span>
                                <span class="am hidden">በሳምንት 3 ቀናት</span>
                            </p>
                            <p>
                                <span class="en">Service Locker Rooms</span>
                                <span class="am hidden">የሎከር ክፍሎች አገልግሎት</span>
                            </p>
                            <a href="login.php" class="btn">
                                <span class="en">Join Now</span>
                                <span class="am hidden">አሁን ይቀላቀሉ</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box wow bounceInUp">
                    <div class="inner">
                        <div class="price-tag">2500 BIRR/Month | 2500 ብር/በወር</div>
                        <div class="img">
                            <img src="images/price2.jpg" alt="price" />
                        </div>
                        <div class="text">
                            <h3>
                                <span class="en">Body Building Training</span>
                                <span class="am hidden">የሰውነት ግንባታ ስልጠና</span>
                            </h3>
                            <p>
                                <span class="en">Get Free WiFi</span>
                                <span class="am hidden">ነጻ ዋይፋይ ያግኙ</span>
                            </p>
                            <p>
                                <span class="en">Month to Month</span>
                                <span class="am hidden">ከወር ወደ ወር</span>
                            </p>
                            <p>
                                <span class="en">5hrs per day</span>
                                <span class="am hidden">በቀን 5 ሰዓት</span>
                            </p>
                            <p>
                                <span class="en">5 days per week</span>
                                <span class="am hidden">በሳምንት 5 ቀናት</span>
                            </p>
                            <p>
                                <span class="en">Service Locker Rooms</span>
                                <span class="am hidden">የሎከር ክፍሎች አገልግሎት</span>
                            </p>
                            <a href="login.php" class="btn">
                                <span class="en">Join Now</span>
                                <span class="am hidden">አሁን ይቀላቀሉ</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="inner">
                        <div class="price-tag">3000 BIRR/Month | 3000 ብር/በወር</div>
                        <div class="img">
                            <img src="images/price3.jpg" alt="price" />
                        </div>
                        <div class="text">
                            <h3>
                                <span class="en">Body Building Training</span>
                                <span class="am hidden">የሰውነት ግንባታ ስልጠና</span>
                            </h3>
                            <p>
                                <span class="en">Get Free WiFi</span>
                                <span class="am hidden">ነጻ ዋይፋይ ያግኙ</span>
                            </p>
                            <p>
                                <span class="en">Month to Month</span>
                                <span class="
                                <span class="am hidden">ከወር ወደ ወር</span>
                            </p>
                            <p>
                                <span class="en">No time limits</span>
                                <span class="am hidden">ያለ ጊዜ ገደብ</span>
                            </p>
                            <p>
                                <span class="en">Everyday of the week</span>
                                <span class="am hidden">በሳምንት ሁሉም ቀናት</span>
                            </p>
                            <p>
                                <span class="en">Service Locker Rooms</span>
                                <span class="am hidden">የሎከር ክፍሎች አገልግሎት</span>
                            </p>
                            <a href="login.php" class="btn">
                                <span class="en">Join Now</span>
                                <span class="am hidden">አሁን ይቀላቀሉ</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="schedule" id="schedule">
        <div class="container">
            <div class="content">
                <div class="box">
                    <h2>
                        <span class="en">Gym Schedules</span>
                        <span class="am hidden">የጂም የጊዜ ሰሌዳዎች</span>
                    </h2>
                    <p>
                        <span class="en">Check out at what times we are open! Make sure to visit our consultants at the specified schedules.</span>
                        <span class="am hidden">በምን ሰዓት እንደምንከፍት ይመልከቱ! አማካሪዎቻችንን በተገለጹት ሰዓታት መጎብኘትዎን ያረጋግጡ።</span>
                    </p>
                </div>
                <div class="box timing">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td></td>
                                <th>
                                    <span class="en"><strong>Consultation</strong></span>
                                    <span class="am hidden"><strong>ምክክር</strong></span>
                                </th>
                                <th>
                                    <span class="en"><strong>Open hours - morning</strong></span>
                                    <span class="am hidden"><strong>የስራ ሰዓት - ጠዋት</strong></span>
                                </th>
                                <th>
                                    <span class="en"><strong>Open hours - afternoon</strong></span>
                                    <span class="am hidden"><strong>የስራ ሰዓት - ከሰዓት</strong></span>
                                </th>
                            </tr>
                            <tr>
                                <td class="day">
                                    <span class="en">Monday</span>
                                    <span class="am hidden">ሰኞ</span>
                                </td>
                                <td>9:00 AM - 11:00 AM</td>
                                <td>6:00 AM to 11:00 AM</td>
                                <td>2:00 PM to 8:00 PM</td>
                            </tr>
                            <tr>
                                <td class="day">
                                    <span class="en">Tuesday</span>
                                    <span class="am hidden">ማክሰኞ</span>
                                </td>
                                <td>3:00 PM - 6:00 PM</td>
                                <td>6:00 AM to 11:00 AM</td>
                                <td>2:00 PM to 8:00 PM</td>
                            </tr>
                            <tr>
                                <td class="day">
                                    <span class="en">Wednesday</span>
                                    <span class="am hidden">ረቡዕ</span>
                                </td>
                                <td>9:00 AM - 11:00 AM</td>
                                <td>6:00 AM to 11:00 AM</td>
                                <td>2:00 PM to 8:00 PM</td>
                            </tr>
                            <tr>
                                <td class="day">
                                    <span class="en">Thursday</span>
                                    <span class="am hidden">ሐሙስ</span>
                                </td>
                                <td>3:00 PM - 6:00 PM</td>
                                <td>6:00 AM to 11:00 AM</td>
                                <td>2:00 PM to 8:00 PM</td>
                            </tr>
                            <tr>
                                <td class="day">
                                    <span class="en">Friday</span>
                                    <span class="am hidden">አርብ</span>
                                </td>
                                <td>8:00 AM - 10:00 AM</td>
                                <td>6:00 AM to 11:00 AM</td>
                                <td>2:00 PM to 8:00 PM</td>
                            </tr>
                            <tr>
                                <td class="day">
                                    <span class="en">Saturday</span>
                                    <span class="am hidden">ቅዳሜ</span>
                                </td>
                                <td>5:00 PM - 7:00 PM</td>
                                <td>6:00 AM to 11:00 AM</td>
                                <td>2:00 PM to 8:00 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="contact" id="contact">
        <div class="container">
            <div class="content">
                <div class="box form">
                    <form action="" method="post">
                        <input type="text" placeholder="Enter Name | ስም ያስገቡ" name="name">
                        <input type="text" placeholder="Enter Email | ኢሜይል ያስገቡ" name="email">
                        <textarea placeholder="Enter Message | መልእክት ያስገቡ" name="message"></textarea>
                        <button type="submit" name="submit_feedback">
                            <span class="en">Send Message</span>
                            <span class="am hidden">መልእክት ይላኩ</span>
                        </button>
                    </form>
                </div>
                <div class="box text">
                    <h2>
                        <span class="en">Get Connected with FITNESS CLUB</span>
                        <span class="am hidden">ከፊትነስ ክለብ ጋር ይገናኙ</span>
                    </h2>
                    <p class="title-p">
                        <span class="en">Our fitness club boasts of the highest quality equipments, services, classes and offers.</span>
                        <span class="am hidden">የእኛ የአካል ብቃት ክለብ ከፍተኛ ጥራት ያላቸው መሣሪያዎች፣ አገልግሎቶች፣ ክፍሎች እና ቅናሾችን ያቀርባል።</span>
                    </p>
                    <div class="info">

            <span class="en">Dire Dawa, in front of DDU University main gate</span>
            <span class="am hidden"></span>

            <span class="fa fa-phone"></span>
            <span class="en">Phone: 0911111111</span>
            <span class="am hidden">ስልክ: 0911111111</span>
        
            <span class="fa fa-envelope"></span>
            <span class="en">Email: gym@gym.com</span>
            <span class="am hidden">ኢሜይል: gym@gym.com</span>

    
</div>

                    <div class="social">
                        <a href=""><span class="fa fa-facebook"></span></a>
                        <a href=""><span class="fa fa-telegram"></span></a>
                        <a href=""><span class="fa fa-whatsapp"></span></a>
                        <a href=""><span class="fa fa-instagram"></span></a>
                    </div>
                    <div class="copy">
                        <span class="en">Powered By &copy; CS group 8</span>
                        <span class="am hidden">በ CS ቡድን 8 የተዘጋጀ &copy;</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    </script>
</body>
</html>
