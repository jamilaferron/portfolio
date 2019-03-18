<?php
	/**
	 * Created by PhpStorm.
	 * User: academy
	 * Date: 2019-03-15
	 * Time: 16:26
	 */
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
<header class="container header-section">
	<nav>
		<img src="img/bars.svg" alt=""/>
		<ul>
			<li><a href="#">Log Out</a></li>
		</ul>
		<div class="page-header">
			<h1>Dashboard</h1>
		</div>
	</nav>
</header>
<main>
	<section class="add-paragraph">
		<h1>Add Paragraph</h1>
		<form class="add-form">
			<textarea rows="20" cols="50"></textarea>
			<input type="submit" name="add_submit">
		</form>
	</section>
	<a href="dashboard.php"><button class="back-button">Back</button></a>
</main>

</body>
</html>