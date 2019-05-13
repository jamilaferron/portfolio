<?php
	session_start();
require_once 'db/dbConnection.php';
require_once 'phpScripts/paragraphFunctions.php';
require_once 'phpScripts/projectFunctions.php';
require_once 'phpScripts/login.php';

$db = dbConnection();
$aboutMeArray = getParagraphs($db);
$paragraphs = viewParagraphs($aboutMeArray);
$projectsArray = getProjects($db);
$projects = viewProjects($projectsArray);

if(!isset($_SESSION['loggedIn'])) {
	$_SESSION['loggedIn'] = false;
}

$loggedIn = $_SESSION['loggedIn'];

logout($loggedIn, 'index.php');

$logoutButton = displayLoginButton($loggedIn, 'index.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jamila Ferron | Web Developer</title>
	<link type="text/css" rel="stylesheet" href="css/normalize.css">
	<link href="https://fonts.googleapis.com/css?family=Coiny|Covered+By+Your+Grace|Muli" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<script src="js/main.js" defer></script>
</head>
<body>
	<div class="menu_toggler">
		<span class="menu_button"></span>
	</div>
	<main class="container">
		<nav>
			<div class="login">
				<a href="login.php"><i class="fas fa-lock fa-lg"></i></a>
			</div>
			<div class="nav-links">
				<a href="#about-section">About Me</a>
				<a href="#portfolio-section">Portfolio</a>
				<a href="#contact-section">Contact Me</a>
				<?php
				echo $logoutButton;
				?>
			</div>

		</nav>
		<div class="wrapper video-wrapper">
			<video autoplay muted loop>
				<source src="img/compressed.mp4" type="video/mp4">
			</video>
		</div>
		<div class="hero-content">
			<h1> Jamila Ferron</h1>
			<p> Full-stack web developer with an interest in PHP web development</p>
		</div>
		<section class="container wrapper about-wrapper" id="about-section" >
			<div class="section-header">
				<h1 class="front-text">About Me</h1>
				<h1 class="shadow-text">My Journey</h1>
			</div>
			<div class="section-main profile-text">
				<?php echo $paragraphs; ?>
			</div>
		</section>
		<section class="container">
			<div class="wrapper portfolio-wrapper" id="portfolio-section">
				<div class="section-header">
					<h1 class="front-text">
						Projects
					</h1>
					<h1 class="shadow-text">My Work</h1>
				</div>
				<div class="gallery">
					<?php echo $projects; ?>
				</div>
			</div>
		</section>
		<section class="container">
			<div class="wrapper contact-wrapper" id="contact-section">
				<div class="section-header">
					<h1 class="front-text">Contact</h1>
					<h1 class="shadow-text">Reach Out!</h1>
				</div>
				<a href="mailto:jamila_ferron@hotmail.co.uk"><i class="fas fa-envelope fa-5x"></i></a>
				<a href="tel:07534955581"><i class="fas fa-phone fa-5x"></i></a>
			</div>
		</section>
		<footer>
			<span class="copy-write">Copyright &copy; Jamila Ferron 2019</span>
			<a target="_blank" href="https://github.com/jamilaferron"><i class="fab fa-github-square fa-3x"></i></a>
			<a target="_blank" href="https://www.linkedin.com/in/jamila-ferron-6491938a/"><i class="fab fa-linkedin fa-3x"></i></a>
		</footer>
	</main>
</body>
</html>