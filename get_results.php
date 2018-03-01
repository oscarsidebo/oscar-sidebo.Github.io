<?php 
session_start();
?> 

<html>
	<head>
		<title>Results Page</title>
		<link rel='stylesheet' type='text/css' href='css/style.css'>
		<script type="text/javascript" src="jquery.js"></script>
	</head>
	<body>

		<?php

## DATABASE OPEN CONNECTION ##

			$servername="artistdatabase.cd2p9dbzyese.us-west-1.rds.amazonaws.com";
			$username="oscarsidebo";
			$password="electro70";
			$dbname="artist_database";

			$conn = new mysqli($servername,$username,$password,$dbname);

			if ($conn->connect_error) {
				die("Connection failed: ". $conn->connect_error);
			}

## VARIABLES ##

			$min = (int)($_POST['minimum']);
			$max = (int)($_POST['maximum']);
			$date = "2017-01-01 00:00:00";

## DATABASE SEARCH ##

			$sql = "SELECT * FROM artist where most_streamed > $min and most_streamed < $max and latest_release > '$date' and notes is null limit 100";
			
## DATABASE RESULT ##

			$result = $conn->query($sql);
			$yourArray = array();
			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$yourArray[$index] = $row;
				$index++;
			}

## DATABASE CONNECTION CLOSE ##

			$conn->close();



			for ($x = 0; $x <= 100; $x++) {
				$artists[$x] = $yourArray[$x]['name'];
				$genres[$x] = $yourArray[$x]['genres'];
				$labels[$x] = $yourArray[$x]['labels'];
				$pr[$x] = $yourArray[$x]['pr'];
				$booking_agents[$x] = $yourArray[$x]['booking_agents'];
				$mgmt[$x] = $yourArray[$x]['mgmt'];
				$most_streamed[$x] = number_format($yourArray[$x]['most_streamed']);
				$monthly_listeners[$x] = number_format($yourArray[$x]['monthly_listeners']);
				$uri[$x] = $yourArray[$x]['uri'];
				$img[$x] = $yourArray[$x]['artwork_url'];
			}

			$_SESSION['page'] = 0;
			$_SESSION['name'] = $artists;
			$_SESSION['genres'] = $genres;
			$_SESSION['labels'] = $labels;
			$_SESSION['pr'] = $pr;
			$_SESSION['booking_agents'] = $booking_agents;
			$_SESSION['mgmt'] = $mgmt;
			$_SESSION['most_streamed'] = $most_streamed;
			$_SESSION['monthly_listeners'] = $monthly_listeners;
			$_SESSION['uri'] = $uri;
			$_SESSION['artwork_url'] = $img;

## Spotify Player Embed ## 

			$base = "https://open.spotify.com/embed/artist/";
			$end = substr($_SESSION['uri'][$_SESSION['page']], 15);
			$newurl = $base . $end;

		?>

<!-- ARTIST INFORMATION -->

 		<div class=wrapper>

			<div class="header2" style="background-size:cover;background-image: url('images/top_decoration.png')">
					<div class="new_search">
						<form method='get' action="./main.php">
							<button type='submit' class="button">New Search</button>
						</form>  
					</div>
			</div>

			<div class="middle">

 				<div id ="background" class="left_box" style="background-size:cover;background-image:url('<?php echo $_SESSION['artwork_url'][$_SESSION['page']]; ?>')">

 					<div class="artist_box">
							<p id="artist"> <?php echo $_SESSION['name'][$_SESSION['page']]; ?> </p>
	 				</div> 

				</div>
			
				<div class="right_box">

 					<div class="streams">
					Top Streamed Song <p id="most_streamed"><?php echo $_SESSION['most_streamed'][$_SESSION['page']]; ?></p>

					Monthly Listeners <p id="monthly_listeners"><?php echo $_SESSION['monthly_listeners'][$_SESSION['page']]; ?></p>
					</div> 

				</div> 




	 			<div class="middle_box">

	 				<div class="player">
 	 					<p id="players"><?php echo "<iframe src= $newurl width='425' height='450' frameborder='0' allowtransparency='true'></iframe>"; ?>
						</p>  
					</div>

				</div>  
			</div>

			<div class="footer2">
				<div class="info">

 					<div class="genres_box">
 						Genres: <p id="genres"> <?php echo $_SESSION['genres'][$_SESSION['page']]; ?></p>
					</div>

					<div class="labels_box">
					Labels: <p id="labels"> <?php echo $_SESSION['labels'][$_SESSION['page']]; ?></p>
					</div>

					<div class="pr_box">
						PR: <p id="pr"> <?php echo $_SESSION['pr'][$_SESSION['page']]; ?></p>
					</div>

					<div class="agents_box">
					Agents: <p id="agents"><?php echo $_SESSION['booking_agents'][$_SESSION['page']]; ?></p>
					</div>

					<div class="management_box">
					Management: <p id="mgmt"><?php echo $_SESSION['mgmt'][$_SESSION['page']]; ?></p>
					</div>
				</div>

<!-- NAVIGATION BUTTONS  -->
 
				<div class="navigation">
					<div class="row1">
						<button type="button" class="nav_buttons" onclick="loadDoc()">Next </button>
						<button type="button" class="nav_buttons" onclick="loadDoc1()">Previous </button>
					</div>

					<div class="row2">
						<button type="button" class="nav_buttons" onclick="loadDoc2()">Lead</button>
						<button type="button" class="nav_buttons" onclick="loadDoc4()">Heard</button>
					</div>

<!-- 	 					<button type="button" onclick="loadDoc3()">Delete</button>  -->


					<div class="bottom_image">
						<img src="images/bottom_decoration.png">
					</div>
				</div>

			</div>



		</div>	 

<!--  CLIENT SIDE SCRIPTS  -->

		<script>

			function loadDoc() {
				var xhttp = new XMLHttpRequest();  
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var query = this.responseText.split('|$|');
						document.getElementById("artist").innerHTML = query[0];
						document.getElementById("genres").innerHTML = query[1];
						document.getElementById("labels").innerHTML = query[2];
						document.getElementById("pr").innerHTML = query[3];
						document.getElementById("agents").innerHTML = query[4];
						document.getElementById("mgmt").innerHTML = query[5];
						document.getElementById("most_streamed").innerHTML = query[6];
						document.getElementById("monthly_listeners").innerHTML = query[7];
						document.getElementById("players").innerHTML = query[8];
						document.getElementById('background').style.backgroundImage = query[9];
					}
				};
				xhttp.open("POST", "update_page.php", true);
				xhttp.send();
			}

			function loadDoc1() {
				var xhttp = new XMLHttpRequest();  
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var query = this.responseText.split('|$|');
						document.getElementById("artist").innerHTML = query[0];
						document.getElementById("genres").innerHTML = query[1];
						document.getElementById("labels").innerHTML = query[2];
						document.getElementById("pr").innerHTML = query[3];
						document.getElementById("agents").innerHTML = query[4];
						document.getElementById("mgmt").innerHTML = query[5];
						document.getElementById("most_streamed").innerHTML = query[6];
						document.getElementById("monthly_listeners").innerHTML = query[7];
						document.getElementById("players").innerHTML = query[8];
						document.getElementById('background').style.backgroundImage = query[9];
					}
				};
				xhttp.open("POST", "update_page 2.php", true);
				xhttp.send();
			}

			function loadDoc2() {
				var xhttp = new XMLHttpRequest();  
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					}
				};
				xhttp.open("POST", "update_lead.php", true);
				xhttp.send();
			}

			function loadDoc3() {
				var xhttp = new XMLHttpRequest();  
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					}
				};
				xhttp.open("POST", "update_delete.php", true);
				xhttp.send();
			}

			function loadDoc4() {
				var xhttp = new XMLHttpRequest();  
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					}
				};
				xhttp.open("POST", "update_heard.php", true);
				xhttp.send();
			}

		</script>

	</body>
</html>
			