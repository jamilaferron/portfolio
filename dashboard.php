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

	if(isset($_POST['userName']) && isset($_POST['password'])) {
		$username = $_POST['userName'];
		$password = $_POST['password'];
		$getUserId = getUserId($db, $username);
		$userId = returnId($getUserId);
		$hashArray = getpassword($db, $userId);
		$hashPassword = returnPassword($hashArray);
		$password_check = password_verify($password, $hashPassword);

		login($password_check, $loggedIn);
	}

	if(isset($_POST['logout'])) {
		logout($loggedIn, 'login.php');
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
		<div>
			<a href="index.php">Home</a>
			<form method="post" action="dashboard.php" class="logout-button">
				<input type="submit" name="logout" value="Logout">
			</form>
		</div>
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