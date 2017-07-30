<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/style.css">
	<title> Search Status System</title>
</head>

<body>
	<div class="window">
	<h1> Status Search System </h1>
		<form action="searchstatusprocess.php" method="GET">
				<label for="search" value="Enter Search: "> 
					<input type="text" name="search" placeholder="Enter a Status Code, or part of an entry here." maxlength="180" style = "width: 80%; margin: 0, 50%;" required />
				</label>
			<input type="submit" name="launchSearch" value="View Status"> </br>

			<div class="footer-links" style="padding-top: 20px;">
				<a href="poststatusform.php"> Post a Status </a> 
				<a href="index.php"> Return to Homepage </a>
			</div>
		</form>
	</div>
</body>
</html>