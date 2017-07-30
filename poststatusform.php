<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/style.css">
	<title> Post Status Form</title>
</head>

<body>
<div class="window">
	<h1> Status Posting System </h1>
	<form action="poststatusprocess.php" method="POST">
		<div class="statform" style="float: left; clear: right; display: inline; width: 100%; clear: right;">
			<label for="entername">Enter name: 
				<input type="text" id="nameform" name="enterName" maxlength="20" placeholder="Enter your name here (Leave blank to post Anonymously)">
			</label>
			<?php
				$codeNum = rand(0, 9999);
				$codeGenerator = ("S" . str_pad($codeNum, 4, "0", STR_PAD_LEFT));	// Pads any number with <4 digits with 0.
			?>
			<label style="padding-left: 8.75%;">Unique Status Code:
				<input type="text" id="codeform" name="uniqueCode" maxlength="5" value="<?php echo $codeGenerator ?>"  required/>
			</label>
		</div>
		
		<div class="statform">
				<input type="text" id="statusentry" name="enterStatus" style="padding-bottom: 15%;" placeholder="Enter Status here (Required)" required>
		</div>

		<div class="statform">
			<label>Enter Date and Time (Required): 
				<input type="time" name="enterDate" value= "<?php echo date('H:i d/m/y');?>" required/>
			</label>
		</div>
		
		<div class="statform">
			<label>Share with:  
				<input type="radio" name="share" value="Privacy: Public"> Public
				<input type="radio" name="share" value="Privacy: Friends Only"> Friends 
				<input type="radio" name="share" value="Privacy: Only Me"> Private (Only Me) <br>
			</label>
		</div>	
	
		<div class="statform">
			<label>Permission Type: <br>
				<input type="checkbox" name="permission[]" value="Allow Likes"> Allow Likes 
				<input type="checkbox" name="permission[]" value=" Allow Comments"> Allow Comments
				<input type="checkbox" name="permission[]" value=" Allow Share"> Allow Share <br>
			</label> 
		</div>
		
		<div id="submission-form" style="padding-bottom: 10px;">
			<input type="submit" name="postStatus" value="Post Status" style="margin-right: 2%;" />
			<input type="reset" name="resetForm"/>	
			<a href="index.php" style="padding-left: 45%;">Return to Homepage</a>
		</div>
	</form>
</div>
</body>
</html>