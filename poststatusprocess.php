<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/style.css">
	<title> Post Status Process</title>
</head>
<body>

<?php
	// JAVASCRIPT VALIDATION ALERTS
	function jsPrompt($alert)
	{
    echo("<script type='text/javascript'> var errorAlert = alert('".$alert."'); </script>");
	}
	//CONNECTING TO DATABASE
	$host = "cmslamp14.aut.ac.nz"; 
	$user = ""; // your user name 
	$pswd = ""; // your password 
	$dbnm = "xny0270"; // your database 

	$connection = mysqli_connect($host, $user, $pswd, $dbnm)
		or die(jsPrompt("Unable to connect to Server. Error: " . mysql_errno()));

	$selectDatabase = mysqli_select_db($connection, $dbnm)
		or die(jsPrompt("Unable to select database." .mysql_errno()));


//ERROR MESSAGES FOR REQUIRED FIELDS
	if(isset($_POST["uniqueCode"], $_POST["enterStatus"], $_POST["enterDate"])) {
		$statusCode = $_POST["uniqueCode"];
		$statusText = $_POST["enterStatus"];
		$statusDate = $_POST["enterDate"];
	}

    //VALIDATE NAME
    if (!empty($_POST["enterName"]))
    {
    	$posterName = $_POST["enterName"];
    }
    else 
    {
    	$posterName = "Anonymous";
    }
    //VALIDATING STATUS CODE
	$dupCheck = mysqli_query($connection, "SELECT * FROM statuses WHERE sCode = '$statusCode'");
	if(mysqli_num_rows($dupCheck) > 0)
	{
		$statusCode = "Duplicate Status Code";
		$invalidCode = true;
	}

    //VALIDATING STATUS
    $compareStatus = preg_replace('/[^a-z0-9\ \.\,\!\?]+/i', '', $statusText);
    if (strcmp($statusText, $compareStatus) != 0)
    {
        $statusText = "Invalid Status";  
        $invalidText = true;
    }

    //VALIDATION ALERTS
    if($invalidCode == true && $invalidText == true)
    {
        jsPrompt("Invalid Status and Date! Only enter numbers, letters and . , ! . characters. Use the default time format as a guide.");
    }

    else if($invalidCode == true)
    {
        jsPrompt("Status Code is already in use!");
    }
    else if($invalidText == true)
    {
        jsPrompt("Invalid Status! Only enter Numbers, Letters and . , ! ? characters. ");
    }        

    if($invalidCode == false && $invalidText == false) //prevents extra settings from printing if required fields are invalid
		{    //PRIVACY SETTINGS
		    if (isset($_POST['share']))
		    {
		        $statusShare = $_POST['share'];
		    }
		    else 
		    {
		        $statusShare = 'Privacy: Public (Default)';
		    }

		    //PERMISSION SETTINGS
		    if (empty($_POST['permission']))
		    {
		        $statusPermission = "Likes, Comments and Shares Disabled.";
		    }
		    else 
		    {   
		    	$statusPermission = implode(',', $_POST['permission']);
		    }

		    $posterName = mysqli_real_escape_string($connection, $posterName);
		    $statusCode = mysqli_real_escape_string($connection, $statusCode);
		    $statusText = mysqli_real_escape_string($connection, $statusText);
		    $statusDate = mysqli_real_escape_string($connection, $statusDate);


		    $selectDatabase = mysqli_select_db($connection, "xny0270")
				or die("<p>The database is not available.</p>");

			$insertToDB = "INSERT INTO statuses(sName, sCode, sText, sDate, sShare, sPermission) VALUES (
			'$posterName','$statusCode', '$statusText', '$statusDate', '$statusShare', '$statusPermission')";
			
			if (!mysqli_query($connection, $insertToDB)) 
			{
		    	jsPrompt("Error: " . $insertToDB . " " . mysqli_error($connection));
			}
			else
			{
		    	jsPrompt("Status Posted!");
		    	$postOutcome = "<h4>Status posted successfully.</h4> </br>";
			} 
			mysqli_free_result($dupCheck);
			mysqli_close($conn);
	}
?> 

<div class="window">
	<?php 
		echo $postOutcome . "<p>Name: " . $posterName . "</br>Code: " . $statusCode . "</br>Status: " . $statusText . "</br>Posted at: " . $statusDate . "</br>" . $statusShare . "</br>" . $statusPermission . "</p>";
	?>
	<div class="footer-links">
		<a href="poststatusform.php">Post another status</a>
		<a href="index.php">Return to Homepage</a>
	</div>
</div>
</body>
</html>