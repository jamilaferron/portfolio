<?php

if(!isset($_SESSION['loggedIn'])) {
	$_SESSION['loggedIn'] = false;
}

$loggedIn = $_SESSION['loggedIn'];

check_loggedIn($loggedIn);

$db = dbConnection();
$aboutMeArray = getParagraphs($db);
$projectsArray = getProjects($db);
$displayParagraphsTable = displayParagraphsTableRow($aboutMeArray);
$displayProjectsTable = displayProjectTableRow($projectsArray);
$paragraphsModal = displayEditParagraphModal($aboutMeArray);
$projectsModal = displayEditProjectModal($projectsArray);

if (isset($_POST['paragraphId'])){
	$paragraphId = $_POST['paragraphId'];
}

if(isset($_POST['delete_item'])) {
	deleteParagraph($db, $paragraphId);
}

if (isset($_POST['projectId'])){
	$projectId = $_POST['projectId'];
}

if(isset($_POST['deleteProject_item'])) {
	deleteProject($db, $projectId);
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

if (isset($_POST['new-paragraph'])){
	$paragraph = $_POST['new-paragraph'];
}

if(isset($_POST['add_submit'])) {
	$checked = checkInputLength($paragraph);
	if($checked) {
		addParagraph($db, $paragraph);
		header("Location: dashboard.php");
	} else {
		$message = 'Your paragraph is empty or too long';
	}
}

if (isset($_POST['edit_submit'])) {
	$editedText = $_POST['edit-paragraph'];
	$checked = checkInputLength($editedText);
	if (!$checked) {
		header("Location: dashboard.php");
	} else {
		$id = $_POST['paragraphId'];
		editParagraph($db, $id, $editedText);
		header("Location: dashboard.php");
	}
}

if(isset($_POST['addproject_submit'])) {
	$name = $_POST["project-name"];
	$url = $_POST["project-url"];

	checkInputLength($name);
	checkInputLength($url);

	$file = $_FILES["fileToUpload"];
	$fileName = $file['name'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($file["name"]);

	if(fileCheck($file, $target_file) === 0){
		$message = "Sorry, your file was not uploaded.";
	}else {
		if (move_uploaded_file($file["tmp_name"], $target_file)) {
			addProject($db, $name, $url, $target_file);
			header("Location: dashboard.php");
		} else {
			$message = "Sorry, there was an error uploading your file.<br>";
		}
	}
}

if(isset($_POST['editProject_submit'])) {
	$name = $_POST['editProject-name'];
	$url = $_POST['editProject-url'];
	$id = $_POST['projectId'];
	$hiddenImg = $_POST['hiddenImg'];

	$file = $_FILES["fileToUpload"];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($file["name"]);

	checkInputLength($name);
	checkInputLength($url);

	if ($file['name'] !== ""){

		if(fileCheck($file, $target_file) === 0){
			$message = "Sorry, your file was not uploaded.";
		}else {
			if (move_uploaded_file($file["tmp_name"], $target_file)) {
				editProject($db, $id, $name, $url, $target_file);
				header("Location: dashboard.php");
			} else {
				$message = "Sorry, there was an error uploading your file.<br>";
			}
		}
	}else {
		editProject($db, $id, $name, $url, $hiddenImg);
		header("Location: dashboard.php");
	}
}
