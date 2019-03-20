<?php
	session_start();
	require_once 'db/dbConnection.php';
	require_once 'phpScripts/editAboutMe.php';
	require_once 'phpScripts/functions.php';

	$db = dbConnection();
	if (isset($_POST['paragraphId'])){
		$paragraphId = $_POST['paragraphId'];
	}

	if (isset($_POST['edit_item'])) {
		$idToEdit = $_POST['paragraphId'];
		$textToPopulateArray = getParagraph($db, $idToEdit);
		$textToPopulate = displayParagraph($textToPopulateArray);
		if(isset($idToEdit)){
			$hiddenInput = displayHiddenInput($idToEdit);
		}
	}
	else if (isset($_POST['edit_submit'])) {
		$editedText = $_POST['edit-paragraph'];
		$checked = checkInputLength($editedText);
		if (!$checked) {
			header("Location: dashboard.php");
		} else {
			$id = $_POST['textToEditId'];
			editParagraph($db, $id, $editedText);
			header("Location: dashboard.php");
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
	<header class="container header-section">
		<nav>
			<img src="img/bars.svg" alt=""/>
			<h1>Dashboard</h1>
		</nav>
	</header>
	<main>
		<section class="add-paragraph">
			<h1>Edit Paragraph</h1>
			<form method="POST" action="editParagraph.php" class="add-form">
				<textarea name="edit-paragraph"><?php
						if (isset($textToPopulate)){
							echo $textToPopulate;
						}
					?></textarea>
				<?php
					if (isset($hiddenInput)){
						echo $hiddenInput;
					}
				?>
				<input type="submit" name="edit_submit">
			</form>
		</section>
		<a href="dashboard.php" class="button back-button">Back</a>
	</main>
</body>
</html>