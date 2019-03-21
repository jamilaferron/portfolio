<?php
	session_start();
	require_once 'db/dbConnection.php';
	require_once 'phpScripts/viewAboutMe.php';
	require_once 'phpScripts/functions.php';
	require_once 'phpScripts/deleteAboutMe.php';
	require_once 'phpScripts/login.php';

	if(!isset($_SESSION['loggedIn'])) {
		$_SESSION['loggedIn'] = false;
	}

	check_loggedIn($loggedIn);

	$db = dbConnection();
	$aboutMeArray = getAboutMe($db);
	$displayTable = displayTableRow($aboutMeArray);
	if (isset($_POST['paragraphId'])){
		$paragraphId = $_POST['paragraphId'];
	}

	if(isset($_POST['delete_item'])) {
		deleteParagraph($db, $paragraphId);
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
		<section class="about-edit">
			<h1>About Section</h1>
			<table class="paragraphs-table">
				<tr>
					<th>Paragraph</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php echo $displayTable; ?>
			</table>
			<a href="addParagraph.php" class="button new-paragraph-button">Add</a>
		</section>
	</main>
</body>
</html>