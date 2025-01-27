<?php
include("insert.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_feedback'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit; // Stop execution if email is invalid
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
    <title>Fitness Club</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="#">Fitness <span>Club</span> <span class="logged">Logged in </span></a>
			</div>
			<a href="javascript:void(0)" class="ham-burger" id="ham-burger">
				<span></span>
				<span></span>
			</a>
			<div class="nav" id="nav">
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#contact">About</a></li>
					<li><a href="#services">Services</a></li>
					<li><a href="#membership">Memberships</a></li>
					<li><a href="#schedule">Schedule</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="index.php">Log out</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="home" id="home">
		<div class="container">
			<h1>Aquire your <span>dream</span> physic.</h1>
			<h1>Starting <span> today.</span></h1>
			<div class="buttons">
				<a href="#membership" class="btn">Membership</a>
			</div>
		</div>
	</div>

	<!-- Start Services -->
	<div class="services" id="services">
	  <div class="container">
	      <div class="content">
	             <div class="box">
	                 <div class="inner">
	                          <div class="img">
	                              <img src="images/about1.jpg" alt="about" />
	                          </div>
	                         <div class="text">
	                             <h4>Free Consultation</h4>
	                             <p>Get a complimentary consultation session with our experts. We'll discuss your fitness goals, assess your current fitness level, and provide recommendations to help you get started on your journey to a healthier lifestyle.</p>
	                         </div>
	                 </div>
	             </div>
	             <div class="box">
	                 <div class="inner">
	                          <div class="img">
	                              <img src="images/about2.jpg" alt="about" />
	                          </div>
	                         <div class="text">
	                             <h4>Best Training</h4>
	                             <p>Experience the best-in-class training programs tailored to your needs. Our team of certified trainers utilizes cutting-edge techniques and equipment to ensure you receive top-notch training and achieve your fitness goals.</p>
	                         </div>
	                 </div>
	             </div>
	             <div class="box">
	                 <div class="inner">
	                          <div class="img">
	                              <img src="images/about3.jpg" alt="about" />
	                          </div>
	                         <div class="text">
	                             <h4>Build Perfect Body</h4>
	                             <p>Transform your physique with our comprehensive body-building programs. Our expert trainers will guide you through personalized workouts and nutrition plans to help you achieve your desired results as soon as possible.</p>
	                         </div>
	                 </div>
	             </div>
	      </div>
	  </div>
	</div>
	<!-- End Services -->


	<!-- Start Price -->
  	<div class="price-package" id="membership">
  	 <div class="container">
  	 	  <h2>Choose Your Package</h2>
  	 	  <p class="title-p">We offer various packages with varying prices. Take a look at the offers down below! </p>
  	 	  <div class="content">
  	 	  	  <div class="box wow bounceInUp">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   <div class="price-tag">
  	 	  	  	  	   	  2000 BIRR/Month
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/price1.jpg" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Body Building Training</h3>
  	 	  	  	  	   	  <p>Get Free WiFi</p>
  	 	  	  	  	   	  <p>Month to Month</p>
  	 	  	  	  	   	  <p>3hrs per day</p>
  	 	  	  	  	   	  <p>3 days per week</p>
  	 	  	  	  	   	  <p>Service Locker Rooms</p>
  	 	  	  	  	   	  <a href="basic.php" class="btn">Join Now</a>
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  	  <div class="box wow bounceInUp" data-wow-delay="0.2s">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   <div class="price-tag">
  	 	  	  	  	   	  2500 BIRR/Month
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/price2.jpg" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Body Building Training</h3>
  	 	  	  	  	   	  <p>Get Free WiFi</p>
  	 	  	  	  	   	  <p>Month to Month</p>
  	 	  	  	  	   	  <p>5hrs per day</p>
  	 	  	  	  	   	  <p>5 days per week</p>
  	 	  	  	  	   	  <p>Service Locker Rooms</p>
  	 	  	  	  	   	  <a href="premium.php" class="btn">Join Now</a>
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  	  <div class="box wow bounceInUp" data-wow-delay="0.4s">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   <div class="price-tag">
  	 	  	  	  	   	  3000 BIRR/Month
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/price3.jpg" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Body Building Training</h3>
  	 	  	  	  	   	  <p>Get Free WiFi</p>
  	 	  	  	  	   	  <p>Month to Month</p>
  	 	  	  	  	   	  <p>No time limits</p>
  	 	  	  	  	   	  <p>Everyday of the week</p>
  	 	  	  	  	   	  <p>Service Locker Rooms</p>
  	 	  	  	  	   	  <a href="vip.php" class="btn">Join Now</a>
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  </div>
  	 </div>
  	</div>
 	<!-- End Price -->

 	<!-- Start Schedule -->
  	<div class="schedule" id="schedule">
  	 <div class="container">
  	 	  <div class="content">
  	 	  	   <div class="box text wow slideInLeft">
  	 	  	   	   <h2>Gym Schedules</h2>
  	 	  	   	   <p>
  	 	  	   	   	Chech out at what times we are open! Make sure to visit our consultants at the specified schedules. 
  	 	  	   	   </p>
  	 	  	   </div>
  	 	  	   <div class="box timing wow slideInRight">
                   <table class="table">
                   	 <tbody>
                   	 	<tr>
                   	 		<td></td>
                   	 		<th><strong>Consultation</strong></th>
                   	 		<th><strong>Open hours - morning</strong></th>
                   	 		<th><strong>Open hours - afternoon</strong></th>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Monday</td>
                   	 		<td>9:00 AM - 11:00 AM</td>
                   	 		<td>6:00 AM to 11:00 AM</td>
                   	 		<td>2:00 PM to 8:00 PM</td>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Tuesday</td>
                   	 		<td>3:00 PM - 6:00 PM</td>
                   	 		<td>6:00 AM to 11:00 AM</td>
                   	 		<td>2:00 PM to 8:00 PM</td>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Wednesday</td>
                   	 		<td>9:00 AM - 11:00 AM</td>
                   	 		<td>6:00 AM to 11:00 AM</td>
                   	 		<td>2:00 PM to 8:00 PM</td>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Thursday</td>
                   	 		<td>3:00 PM - 6:00 PM</td>
                   	 		<td>6:00 AM to 11:00 AM</td>
                   	 		<td>2:00 PM to 8:00 PM</td>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Friday</td>
                   	 		<td>8:00 AM - 10:00 AM</td>
                   	 		<td>6:00 AM to 11:00 AM</td>
                   	 		<td>2:00 PM to 8:00 PM</td>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Saturday</td>
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
	<!-- End Schedule -->


 	<!-- Start Contact -->
   	<div class="contact" id="contact">
     <div class="container">
        <div class="content">
            <div class="box form">
               <form action>
                  <input type="text" placeholder="Enter Name" name = "name">
                  <input type="text" placeholder="Enter Email" name = "email">
                  <textarea placeholder="Enter Message" name = "message"></textarea>
                  <button type="submit" name = "submit_feedback">Send Message</button>
               </form>
            </div>
            <div class="box text">
                 <h2>Get Connected with FITNESS CLUB</h2>
                  <p class="title-p"> Our fitness club boasts of the highest quality equipments, services, classes and offers. Once you join our growing community of members, you will achieve your goals with our never relenting support, care and guidance.</p>
                  <div class="info">
                      <ul>
                          <li><span class="fa fa-map-marker"></span> Dire Dawa, in front of DDU University main gate.</li>
                          <li><span class="fa fa-phone"></span> 09111111111</li>
                          <li><span class="fa fa-envelope"></span> gym@gym.com</li>
                      </ul>
                  </div>
                  <div class="social">
                       <a href=""><span class="fa fa-facebook"></span></a>
                       <a href=""><span class="fa fa-linkedin"></span></a>
                       <a href=""><span class="fa fa-skype"></span></a>
                       <a href=""><span class="fa fa-youtube-play"></span></a>
                  </div>

                  <div class="copy">
                      PowerBy &copy; CS group 8
                  </div>
            </div>
        </div>
     </div>
  	</div>
 	<!-- End Contact -->
 	<?php
		include("DBconnect.php");

		$message = "";

		// Check if the form is submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    $username = $_POST['username'];
		    $email = $_POST['email'];
		    $password = $_POST['password'];

		   
		    $checkQuery = "SELECT * FROM account WHERE username='$username' OR email='$email'";
		    $checkResult = $conn->query($checkQuery);

		    if ($checkResult->num_rows > 0) {
		      
		        $message = "Error: Username or email already exists.";
		    } else {
		        
		        $sql = "INSERT INTO account (username, password, email) VALUES ('$username', '$password', '$email')";

		        if ($conn->query($sql) === TRUE) {
		            
		            $message = "New record created successfully";
		        } else {
		            
		            $message = "Error: " . $sql . "<br>" . $conn->error;
		        }
		    }

		    $conn->close();
		}

		echo "<script>var registerMessage = '$message';</script>";
	?>
	<script>
		document.getElementById('ham-burger').addEventListener('click', function() {
			this.classList.toggle('active');
			document.getElementById('nav').classList.toggle('open');
		});
		var modal = document.getElementById('popupForm');

		var loginLink = document.getElementById("loginLink");

		loginLink.onclick = function() {
		    modal.style.display = "block";
		}

		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
		var modalReg = document.getElementById('popupFormReg');

		var loginLink = document.getElementById("register");

		register.onclick = function() {
			modal.style.display = "none";
		    modalReg.style.display = "block";
		}

		window.onclick = function(event) {
		    if (event.target == modal || event.target == modalReg) {
		        modal.style.display = "none";
		        modalReg.style.display = "none";
		    }
		}

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
    document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('insert.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('response').innerHTML = data; // Display response
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    if (registerMessage !== "") {
        document.getElementById("registeredPopup").style.display = "block";

        document.getElementById("registerPopup").style.display = "none";
    }
	</script>
</body>
</html>
