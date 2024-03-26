<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Book Event</title>
	<link rel="stylesheet" href="style.css">
	<style>
		#googleMap {
			display: none;
		}

		#filter {
			display: none;
		}

		#city {
			display: none;

		}

		#cat {
			display: none;

		}

		#events {
			display: none;

		}

		.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			transition: 0.3s;
			width: 300px;
			border-radius: 10px;
			display: inline-block;
			margin-left: 30px;
			margin-bottom: 30px;
		}

		.card:hover {
			box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
			cursor: pointer;
		}

		.container {
			padding: 2px 16px;
		}

		.card img {
			border-radius: 10px;
		}

		a {
			text-decoration: none;
			font-size: 20px;
			background-color: #4d4d4d;
			padding: 1% 4%;
			color: white;
			border-radius: 10px;
		}

		a:hover {
			background: none;
			color: #4d4d4d;
		}
	</style>
</head>

<body class="user_background">
	<div align="left">
		<nav>
			<a href="main.php">Home</a>
			<a href="book_event.php" class="active">Book Event</a>
			<a href="scheduled_events.php">Scheduled Events</a>
			<a href="profile.php">Profile</a>
			<a href="login.php">Logout</a>
       </nav>
	</div>
	<br><br>
	<div id="btns" align="center">

		<h1 style="color:#595959">See Our Events</h1>
		<button id="all" onclick="showMap()" class="users_btn">Show Map</button><br><br>
		<button onclick="showEvents()" class="users_btn">Book Event</button>
	</div>
	
	<div id="googleMap" style="width:100%;height:500px;"></div>
	<div id="events" align="center">
		<br><br>
		<div style="width: 80%;">
			<h1 style="color : #595959">Book Event</h1>
			<?php
			$query = "SELECT * FROM events";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$events = $stmt->fetchAll();
			foreach ($events as $g) {
				$query = "SELECT * FROM books where event_id=? and user_id = ?";
				$stmt = $conn->prepare($query);
				$stmt->execute([$g['id'], $_SESSION['id']]);
				$groups = $stmt->fetchAll();

				if ($stmt->rowCount() > 0) {
				} else {
					echo '<div class="card">
                <img src="images/event.jpg" alt="Avatar" style="width:100%">
                <div class="container"  align="left">
                    <p>Event Name : <b>' . $g['name'] . '</b></p> 
					<p>City : <b>' . $g['city'] . '</b></p> 
                    <p>Event Category : <b>' . $g['category'] . '</b></p>
                    <p>Coordinator : <b>' . $g['coordinator_name'] . '</b></p>
					<p> Date : <b>' . $g['date'] . '</b></p>
					<p>Start Time : <b>' . $g['s_time'] . '</b></p>
					<p>End Time : <b>' . $g['e_time'] . '</b></p>
                    <div align="center">
                    <a href="books.php?id=' . $g['id'] . '">Book Event</a>
                    <br><br>
                    </div>  
                </div>
                </div>';
				}
			}

			?>
		</div>
	</div>

	
	<script>
		function showEvents() {
			document.getElementById("events").style.display = "block";
			document.getElementById("googleMap").style.display = "block";
			document.getElementById("btns").style.display = "none";
		}
	</script>
	<script>
		function showMap() {
			document.getElementById("googleMap").style.display = "block";
			document.getElementById("filter").style.display = "none";
		}
	</script>
	<script>
		function myMap() {
			var mapProp = {
				center: new google.maps.LatLng(24.755562, 46.589584),
				zoom: 6,
			};

			var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

			function addMarker(coords, label) {
				var marker1 = new google.maps.Marker({
					position: coords,
					map: map,
					label: label
				});
			}
			const element = document.getElementById("all");
			element.addEventListener("click", allEvents());

			function allEvents() {


				<?php
				include("connection.php");
				$sql2 = "SELECT * from events";
				$stmt2 = $conn->prepare($sql2);
				$stmt2->execute();
				$events = $stmt2->fetchAll();

				foreach ($events as $u) {
					echo 'addMarker({lat:' . $u['lat'] . ',lng:' . $u['log'] . '},{
		  text: "' . $u['name'] . '",
		  color: "#e6e600",
		  fontSize: "30px",
		  fontWeight: "bold"
	
		});';
				}

				?>
			}

			
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb9NT5-qr-upx_YBIA9OVIMtVVfdDQtjI&callback=myMap"></script>
	
</body>

</html>