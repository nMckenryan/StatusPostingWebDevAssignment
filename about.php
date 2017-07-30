<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/style.css" />
	<title>About Page</title>
</head>

<body>
	<div class="window">
		<h1> ABOUT PAGE </h1>
		<h2> What special features have you done, or attempted, in creating the site that we should know about? </h2>
		<ul>
			<li>I wanted to use the Bootstrap framework to make some of the CSS work easier, but the rules of the assignment meant I could not use Absolute referencing, and there for could not import the bootstrap.css file. </li>
			<li>I allowed the user to input a name when posting a status. If a name was not entered, the name for the post would default as "Anonymous". </li>
			<li>For the error messages, I used Javascript alerts that showed what fields were incorrect. </li>
			<li>For the Permissions portition of the poststatusform. I tried to concatenate the share messages together with a for loop. But this did not work properly, so I resorted to a series of if statements, similar to the Javascript alerts. </li>
		</ul>


		<h2> Which parts did you have trouble with? </h2>
		<ul>
			<li>I attempted to Validate the Date input to conform to the regular expression. (\d\d\:\d\d \d\d\/\d\d\/\d\d). I spent a considerable amount of time tryign to get this piece of code to work, but it clashed with the status validation and crashed the site. </li>
			<li>I had trouble figuring out what Regular expression to use to purge all undesired characters. Using the Regular Expression Tool really helped.</li>
			<li>I spent a bit of time building a PHP function that would prevent the user from progressing if the required forms were not filled in. I found I could just as easily use the "required" keyword inside the input tag.</li>
			<li>The Permission type checkboxes are quite finicky and would not show up on the database. </li>
			<li>I figured out how to make the Status Text input longer, but not larger, like the example.</li>
		</ul>

		<h2> What would you do better next time? </h2>
		<ul>
			<li>I feel like I have a bit of useless code in this website. In future, I will use more efficient methods.</li>
			<li>I would like to represent the "Post Status Process" confirmation page as a pop-up instead of a full webpage.</li>
			<li>I will plan ahead and use my time better. For my next assignment, I will chip off little pieces of the tasks each week, so I have more time to polish the page closer to the due date. </li>
			<li>I would add a few animations and use more Javascript with the page.</li>
		</ul>

		<h2>What references/sources have you used to help you create your website?</h2>
		<ul>
			<li>I used the Regular Expression tool: http://regexr.com/ to help me understand and implement Regular Expressions while developing code to validate the users' input.</li>
			<li>I used w3schools.com to brush up on HTML and CSS syntax.</li>
			<li>When starting the Database work, I read many threads on StackOverflow to get a rough idea of what I was doing.</li>
			<li>Whenever my page was not loading. I reviewed by code with PHP Code checker: https://phpcodechecker.com/ to find syntax errors in my PHP code.</li>
			<li>For the background image, I used a Royalty free Wood Grain image from: https://www.flickr.com/photos/9822107@N08/5074078012 </li>

		</ul>

		<h2>What have you learned along the way?</h2>
		<ul>
			<li>I have learned how to send data to a MySQL database and validate it.</li>
			<li>I feel a bit more confident using CSS. Previously, I relied on frameworks to build websites.</li>
			<li>I learned how to incorporate Regular Expressions into Web Development.</li>
		</ul>

		<div class="footer-links">
			<a href="index.php">Return to Homepage</a>
		</div>

	</div>
</body>
</html>