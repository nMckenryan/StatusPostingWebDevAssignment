<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/style.css">
	<title>Search Status Process</title>
</head>

<body>
<div class="window">
	<?php
		//JAVASCRIPT ALERTS
		function jsPrompt($alert)
		{
	    	echo("<script type='text/javascript'> var errorAlert = alert('".$alert."'); </script>");
		}

		if(isset($_GET["search"]))
		{
			$searchCriteria = $_GET["search"];
			$searchCriteria = preg_replace('/[^a-zA-Z0-9\ \.\,\!\?\:]+/i', "", $searchCriteria);
		}
		
		//CONNECTING TO DATABASE
		$host = "cmslamp14.aut.ac.nz"; 
		$user = ""; // your user name 
		$pswd = ""; // your password 
		$dbnm = "xny0270"; // your database 

		$connection = mysqli_connect($host, $user, $pswd, $dbnm)
			or die(jsPrompt("Unable to Connect to server." . mysql_errno()));

		$selectDatabase = mysqli_select_db($connection, $dbnm)
			or die(jsPrompt("Unable to select database. " . mysql_errno()));

		$selectTable =  mysqli_query($connection, "SHOW TABLES FROM $dbnm LIKE 'statuses'")
			or die(jsPrompt("Unable to select database table. "));

		//SEARCHES ALL STATUS FIELDS WITH SEARCH CRITERIA
		$searchWord = "%$searchCriteria%";
		$results = mysqli_query($connection, "SELECT * FROM statuses WHERE sName LIKE '$searchWord' OR sCode LIKE '$searchWord' OR sText LIKE '$searchWord' OR sDate LIKE '$searchWord' ORDER BY sDate desc")
			or die("Could not connect query to database table.");
		$rowNum = mysqli_num_rows($results);
		$fieldNum = mysqli_num_fields($results);

		if($rowNum != 0 && $fieldNum != 0)
		{
			$resultsFound = "<p>" .$rowNum. "and" .$fieldNum. "matches found </p>";
				while($row = mysqli_fetch_assoc($results))
				{
					$namePrint = $row['sName'];
					$codePrint =  $row['sCode'];
					$textPrint = $row['sText'] ;
					$datePrint = $row['sDate'];
					$sharePrint = $row['sShare'];
					$permissionPrint = $row['sPermission'];

					echo "<p>Name: " . $namePrint . "</br>Code: " . $codePrint . "</br>Status: " . $textPrint . "</br> Posted at: " . $datePrint . "</br>" . $sharePrint . "</br>" . $permissionPrint  . "</p>";
				}
		}
		else 
		{
			$resultsFound = "No matches found";
			jsPrompt("No matches found.");
		}

		mysqli_free_result($selectTable);
		mysqli_free_result($results);
		mysqli_close($connection);
	?>
	<div class="footer-links">	
		<a href="searchstatusform.php">Search for another Status</a>
		<a href="poststatusform.php">Post Status</a>
		<a href="index.php">Return to Homepage</a>
	</div>
</div>
</body>
</html>