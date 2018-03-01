<?php  
	session_start(); 
?>

<html>
	<head>
		<title>Search Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel='stylesheet' type='text/css' href='css/style.css'>
	</head>
	<body>
		<div class="wrapper">

			<div class="header"></div>

			<div class="search-block">
				
				<div class="head">
					<h2>Choose Streaming Range</h2>
				</div>

				<div class="forms">
					<div class="minmax">Minimum <br><br> Maximum </div>

					<div class="inputs">
						<form action="get_results.php" method="POST">
							<input type="text" name="minimum"><br><br><br>
							<input type="text" name="maximum"><br>
							<input type="submit" class="button", value="Search"> 
						</form>
					</div>
						
				</div>
				
			</div>

			<div class="footer">
 				<div class="image">
					<img src="images/mainpage_decoration.png">
				</div> 
			</div>
		</div>


	</body>
</html> 
			