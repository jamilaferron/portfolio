<?php
	require 'db/dbConnection.php';
	require 'phpScripts/viewAboutMe.php';
	require 'phpScripts/functions.php';
	require 'phpScripts/deleteAboutMe.php';

	$db = dbConnection();
	$result = getAboutMe($db);
	$string = displayTableRow($result);
	$id = $_POST['paragraphId'];

	if(isset($_POST['delete_item'])) {
		deleteParagraph($db, $id);
	}

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
			<h1>Dashboard</h1>
		</nav>
	</header>
	<main>
		<section class="message">

		</section>
		<section class="about-edit">
			<h1>About Section</h1>
			<table class="paragraphs-table">
				<tr>
					<th>Paragraph</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php

					echo $string;
				?>
			</table>
			<a href="addParagraph.php" class="button new-paragraph-button">Add</a>
		</section>
	</main>
</body>
</html>