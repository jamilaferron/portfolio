<?php
session_start();

require 'db/dbConnection.php';
require 'phpScripts/addParagraph.php';

$db = dbConnection();
$paragraph = $_POST['new-paragraph'];

if(isset($_POST['add_submit'])) {
	$message = addParagraph($db, $paragraph);
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
			<h1>Dashboard</h1>
		</nav>
	</header>
	<main>
		<section class="message">
			<?php
				if (isset($message)){
					echo $message;
				}
			?>
		</section>
		<section class="add-paragraph">
			<h1>Add Paragraph</h1>
			<form method="post" action="addParagraph.php" class="add-form">
				<textarea name="new-paragraph"></textarea>
				<input type="submit" name="add_submit">
			</form>
		</section>
		<a href="dashboard.php" class="button back-button">Back</a>
	</main>
</body>
</html>