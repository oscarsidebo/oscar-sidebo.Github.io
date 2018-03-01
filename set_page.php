<!DOCTYPE html>
<html>
<head>
	<title>Result Window</title>
	<link rel='stylesheet' type='text/css' href='stylesheet.css'>
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>

	<div class=wrapper>
			<div class="box box2">
				Artist: <?php echo $yourArray[$page]['name']; ?><br><br>
				Genres: <?php echo $yourArray[$page]['genres']; ?><br><br>
				Labels: <?php echo $yourArray[$page]['labels']; ?><br><br>
				PR: <?php echo $yourArray[$page]['pr']; ?><br><br>
				Agents: <?php echo $yourArray[$page]['booking_agents']; ?><br><br>
				Management: <?php echo $yourArray[$page]['mgmt']; ?><br><br>
				Most Streamed: <?php echo $yourArray[$page]['most_streamed']; ?><br><br>
				Monthly Listeners: <?php echo $yourArray[$page]['monthly_listeners']; ?>
				<br><br>
			</div> 


			<div class="box box4">
				<iframe src="https://open.spotify.com/embed/artist/<?php echo substr($yourArray[$page]['uri'], 15) ?> " width="350" height="350" frameborder="0" allowtransparency="true"></iframe>
			</div>


			<div class="box box5">
				<form>
					<input type="text" id="name" placeholder="Enter Name..."/><br>
					<input type="text" id="age" placeholder="Enter age..."/><br>
					<input type="button" value="submit" onclick="post();">
				</form>

				<div id="result"></div>

				<script type="text/javascript">
					
				</script>
				
				<form method='get' action="./main.html">
					<button type='submit' class="button">New Search</button><br>
				</form>
			</div>	

		</div>	


</body>
</html>