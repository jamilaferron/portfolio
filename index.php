<?php
	session_start();
require 'db/dbConnection.php';
require 'phpScripts/functions.php';
require 'phpScripts/viewAboutMe.php';
require_once 'phpScripts/login.php';

$db = dbConnection();
$aboutMeArray = getAboutMe($db);
$paragraphs = viewParagraphs($aboutMeArray);

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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
	<header class="container header-section">
		<nav>
			<a href="login.php"><i class="fas fa-lock"></i></a>
			<?php
				echo $logoutButton;
			?>
			<img src="img/bars.svg" alt=""/>
			<ul>
				<li><a href="#about-section">About Me</a></li>
				<li><a href="#portfolio-section">Portfolio</a></li>
				<li><a href="#contact-section">Contact Me</a></li>
			</ul>
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
	</header>
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
				<div class="project-container project-1">
					<div class="card-overlay">
						<div class="overlay-text">Logo Challenge</div>
						<a target="_blank" href="https://github.com/jamilaferron/Mayden-Academy-Logo"><div class="button"> View More</div></a>
					</div>
				</div>
				<div class="project-container project-2">
					<div class="card-overlay">
						<div class="overlay-text">Pilot Shop</div>
						<a target="_blank" href="https://git@github.com/jamilaferron/PilotShop-Build"><div class="button"> View More</div></a>
					</div>
				</div>
				<div class="project-container project-3">
					<div class="card-overlay">
						<div class="overlay-text">Paint Master 3000</div>
						<a target="_blank" href="https://dev.maydenacademy.co.uk/projects/2019Feb/2019-paint-app/"><div class="button"> View More</div></a>
					</div>

				</div>
				<div class="project-container project-4">
					<div class="card-overlay">
						<div class="overlay-text">Aptitude Test</div>
						<a target="_blank" href="https://github.com/Mayden-Academy/aptitude-test/tree/master/app"><div class="button"> View More</div></a>
					</div>
				</div>
				<div class="project-container coming-soon">
					<div class="card-overlay">
						<div class="overlay-text">Logo Challenge</div>
						<a href="#"><div class="button"> View More</div></a>
					</div>
				</div>
				<div class="project-container coming-soon">
					<div class="card-overlay">
						<div class="overlay-text">Logo Challenge</div>
						<a href="#"><div class="button"> View More</div></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="container">
		<div class="wrapper contact-wrapper" id="contact-section">
			<div class="section-header">
				<h1 class="front-text">Contact</h1>
				<h1 class="shadow-text">Reach Out!</h1>
			</div>
			<div class="contact-icon-wrapper">
				<a href="mailto:jamila_ferron@hotmail.co.uk"><img class="contact-icon" src="img/envelope.svg" alt=""/></a>
			</div>
			<div>
				<a href="tel:07534955581"><img class="contact-icon" src="img/phone.svg" alt=""/></a>
			</div>
		</div>
	</section>
	<footer>
		<a target="_blank" href="https://github.com/jamilaferron"><img class="footer-icon" src="img/github-sign.svg" alt=""/></a>
		<a target="_blank" href="https://www.linkedin.com/in/jamila-ferron-6491938a/"><img class="footer-icon" src="img/linkedin.svg" alt=""/></a>
	</footer>
</body>
</html>