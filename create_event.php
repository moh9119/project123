<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Events</title>
	<link rel="stylesheet" href="style.css">
    <style>
.dropbtn {
  background-color: #cc9966;
  color: white;
  padding: 8px;
  font-size: 16px;
  border: none;
  min-width: 440px;
  border-radius: 8px;

}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropbtn:hover {
    background-color: white;
    color: #cc9966;
    cursor: pointer;
    }
#googleMap{
    display: none   ;
}
</style>
</head>
<body class="user_background">
	<div align="left">
	<nav>
		<a href="main_coordinator.php">Home</a>
		<a href="create_event.php"  class="active">Create Event</a>
        <a href="my_events.php">My Events</a>
        <a href="logout.php">Logout</a>
	</nav>
	</div>
	<br><br>
	<div align="center">
        <div id="coordinator" class="signup_div">
			<h1 align="center">Create Event</h1>
			<form action="create_event_in.php" method="post" name="event_form">
            <input id="l1" class="input_c" type="hidden" name="lat" >
            <input id="l2" class="input_c" type="hidden" name="log">
            <input class="input_c" type="text" name="name" placeholder="Enter Event Name">
            
            <input class="input_c" type="date" name="date">
            <br>
            <label>Start Time</label>
            <input class="input_c_date" type="time" name="s_time"><br>
            <label>End Time</label>
            <input class="input_c_date" type="time" name="e_time" >
			<select class="input_c_select" name="category" value="Select Category">
                <option value="Sport" selected>Sport</option>
				        <option value="Culture">Culture</option>
                <option value="Education">Education</option>
                <option value="Other">Other</option>
            </select>
            <select class="input_c_select" name="city" value="Select Gender">
                <button>sdasd</button>
                <option value="Najran" selected>Najran</option>
				        <option value="Al Riadh">Riadh</option>
                <option value="Makkah">Makkah</option>
                <option value="Jazan">Jazan</option>
                <option value="Jeddah">Jeddah</option>
                <option value="Al Baha">Al Baha</option>
            </select><br><br>
           
            <button onclick="show()" type="button" class="dropbtn">Choose Location</button><br><br>
            <div  id="googleMap" style="width:100%;height:300px;"></div><br>
			<input type="submit" name="cor" class="signup_btn" value="Create">
			</form>
		</div>

	</div>
  <?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'created') echo '<script>alert("Event Created Successfully")</script>';
              
                }
            ?>
    
<script type="text/JavaScript">

function show() {
    document.getElementById("googleMap").style.display="block";
}

function myMap() {
var mapProp= {
  center:new google.maps.LatLng(17.565604,44.228944),
  zoom:8 ,
};

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
function addMarker(coords,label){
  var marker1 = new google.maps.Marker({position:coords,map:map,label : label});
}

    google.maps.event.addListener(map, 'click', function( event ){
  alert( "Nice you choose the event location"+"\nLatitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
  var marker = new google.maps.Marker({position:{lat:event.latLng.lat(),lng:event.latLng.lng()  },label:{
      text: "event location",
      color: "#0039e6",
      fontSize: "20px",
      fontWeight: "bold"

    },map:map});
  var l1 = document.getElementById("l1");
  var l2 = document.getElementById("l2");
  l1.setAttribute('value', event.latLng.lat());
  l2.setAttribute('value', event.latLng.lng());
  //window.location.href = "location_update_trainer.php?lat="+event.latLng.lat()+"&lon="+event.latLng.lng();
});

}
var today = new Date().toISOString().split('T')[0];
		document.getElementsByName("sdate")[0].setAttribute('min', today);
		document.getElementsByName("edate")[0].setAttribute('min', today);
</script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb9NT5-qr-upx_YBIA9OVIMtVVfdDQtjI&callback=myMap"></script>
</body>
</html>