<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Jamila Ferron | Dashboard</title>
	<link type="text/css" rel="stylesheet" href="css/normalize.css">
	<link href="https://fonts.googleapis.com/css?family=Coiny|Covered+By+Your+Grace|Muli" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/cms.css">
</head>
<body>
<nav class="container header-section">
	<h1>Dashboard</h1>
	<a href="index.php" class="home-button">Home</a>
</nav>
<section class="login-container">
	<form method="post" action="phpScripts/functions.php">
		<div>
			<label for="userName">Username
				<input type="text" name="userName">
			</label>
		</div>
		<div>
			<label for="password">Password
				<input type="password" name="password">
			</label>
		</div>
		<div>
			<input type="submit" name="login">
		</div>
	</form>
</section>
</body>
</html>