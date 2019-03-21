<?php
session_start();

require_once 'db/dbConnection.php';
require_once 'phpScripts/addParagraph.php';
require_once 'phpScripts/functions.php';

$db = dbConnection();

if (isset($_POST['new-paragraph'])){
	$paragraph = $_POST['new-paragraph'];
}

if(isset($_POST['add_submit'])) {
	$checked = checkInputLength($paragraph);
	if($checked) {
		$message = addParagraph($db, $paragraph);
	} else {
		$message = 'Your paragraph is empty or too long';
	}
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
	<nav class="container header-section">
		<h1>Dashboard</h1>
	</nav>
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
			<form method="POST" action="addParagraph.php" class="add-form">
				<textarea name="new-paragraph"></textarea>
				<input type="submit" name="add_submit">
			</form>
		</section>
		<a href="dashboard.php" class="button back-button">Back</a>
	</main>
</body>
</html>