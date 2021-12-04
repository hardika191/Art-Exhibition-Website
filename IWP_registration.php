<?php

session_start();
include_once("db.php");
if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['gender']) && isset($_POST['event']) && isset($_POST['guest']) && isset($_POST['extra']) && isset($_POST['food']))
{
	$first=	$_POST['first_name'];
	$last=	$_POST['last_name'];
	$email=	$_POST['email'];
	$phone=	$_POST['phone'];
	$gender=$_POST['gender'];
	$event=	$_POST['event'];
	$guest=	$_POST['guest'];
	$extra=	$_POST['extra'];
	$food=	$_POST['food'];
	$sql_store=" INSERT into registration_info (id, f_name, l_name, email, phone, gender, event, person, extras, food) VALUES (NULL, '$first', '$last', '$email', '$phone', '$gender', '$event', '$guest', '$extra', '$food') ";
	$sql=mysqli_query($db,$sql_store) or die(mysql_error());
}
else{
	echo "Please fill out every detail";
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link type="text/css" href="css/event_registration.css" rel="stylesheet">
</head>

<body>
<form class="form" action="IWP_registration.php" method="POST" >
<h1 id="title1">Event Registration</h1>
<p class="para1">If you would like to take part in our event, please fill in your details in the Event Registration Form below and you will be automatically registered. Event registration must be completed at least six (6) days prior to the event.
</p>
<hr style="border-top:dotted 1px black">
<div class="personal">
<h4 class="fonts">Name:</h4>
<input type="text" name="first_name" placeholder="First" required>
<input type="text" name="last_name" placeholder="Last" required>
<h4 class="fonts">Email:</h4>
<input type="email" name="email" placeholder="Email" required>
<h4 class="fonts">Phone:</h4>
<input type="number" name="phone" required>
</div>
<br>
<hr style="border-top:dotted 1px black">
<h4 class="fonts">Gender:</h4>
<input type="radio" name="gender"  required>Male<br>
<input type="radio" name="gender">Female<br>
<input type="radio" name="gender">Other<br>
<br>
<h4 class="fonts">Event (You want to Attend):</h4>
<select name="event">
<option>Guided Tours</option>
<option>Live Demonstration</option>
<option>Award Ceremony</option>
<option>Painting Workshop</option>
</select><br>

<h4 class="fonts">How many friend will you bring along?</h4>
<select name="guest">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select><br>

<h4 class="fonts">Any Items you will be caring along?</h4>
<select name="extra">
<option>Camera</option>
<option>DSLR</option>
<option>Food Items</option>
<option>Extra Stuff</option>
</select>
<br>

<h4 class="fonts">What type of Food you prefer?</h4>
<input type="checkbox" name="food">Vegeterian<br>
<input type="checkbox" name="food">Non-Vegeterian<br>
<input type="checkbox" name="food">Jain Food<br>
<input type="checkbox" name="food">South Indian<br>

<hr style="border-top:dotted 1px black">
<p class="para1">Below, you can find a map of the event venue.<br>
Please contact us for any further details</p>
<div id="map" style="width:300px;height:300px;background:yellow"></div>

<input type="submit" value="Submit Form" >
</form>

<script>
function myMap() {
var mapOptions = {
    center: new google.maps.LatLng(51.5, -0.12),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.HYBRID
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
</body>
</html>
