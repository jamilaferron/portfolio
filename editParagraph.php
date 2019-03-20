<?php
	session_start();
	require 'db/dbConnection.php';
	require 'phpScripts/editAboutMe.php';

	$db = dbConnection();
	$paragraphId = $_POST['paragraphId'];

	if (isset($_POST['edit_item'])) {
		$idToEdit = $_POST['paragraphId'];
		$textToPopulateArray = getParagraph($db, $idToEdit);
		$textToPopulate = displayParagraph($textToPopulateArray);
	}
	else if (isset($_POST['edit_submit'])) {
		$editedText = $_POST['edit-paragraph'];
		$id = $_POST['textToEditId'];
		$result = editParagraph($db, $id, $editedText);
		if ($result) {
			$message = '<p>Your paragraph has been edited!</p>';
		} else {
			$message = '<p>Your paragraph has not been edited!</p>';
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
			<ul>
				<li><a href="#">Log Out</a></li>
			</ul>
			<h1>Dashboard</h1>
		</nav>
	</header>
	<main>
		<section class="message">
			<?php  echo $message; ?>
		</section>
		<section class="add-paragraph">
			<h1>Edit Paragraph</h1>
			<form method="post" action="editParagraph.php" class="add-form">
				<textarea rows="20" cols="63" name="edit-paragraph"> <?php echo $textToPopulate; ?>
				</textarea>
				<?php
					if(isset($idToEdit)) {
						echo '<input type="hidden" name="textToEditId" value="' . $idToEdit .'">';

					}
				?>
				<input type="submit" name="edit_submit">
			</form>
		</section>
		<a href="dashboard.php" class="button back-button">Back</a>
	</main>
</body>
</html>