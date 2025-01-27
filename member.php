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
				<a href="#">Fitness <span>Club</span> <span class="logged">Loggin in </span></a>
			</div>
			<a href="javascript:void(0)" class="ham-burger" id="ham-burger">
				<span></span>
				<span></span>
			</a>
			<div class="nav" id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#contact">About</a></li>
					<li><a href="#schedule">Schedule</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>
	


	<!-- Start Schedule -->
  	<div class="schedule" id="schedule">
  	 <div class="container">
  	 	
  	 	  <div class="content">
  	 	  	   <div class="box text">
  	 	  	   	   <h2>Gym Schedules</h2>
  	 	  	   	   <p>
  	 	  	   	   	Chech out at what times we are open! Make sure to visit our consultants at the specified schedules. 
  	 	  	   	   </p>
  	 	  	   	   
  	 	  	   </div>
  	 	  	   <div class="box timing">
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
                          <li><span class="fa fa-map-marker"></span>Dire Dawa, in front of DDU University main gate.</li>
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
	<script>
		document.getElementById('ham-burger').addEventListener('click', function() {
			this.classList.toggle('active');
			document.getElementById('nav').classList.toggle('open');
		});
	</script>
</body>
</html>
