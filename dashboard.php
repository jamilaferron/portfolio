<?php
	/**
	 * Created by PhpStorm.
	 * User: academy
	 * Date: 2019-03-15
	 * Time: 16:26
	 */
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
			<div class="page-header">
				<h1>Dashboard</h1>
			</div>
		</nav>
	</header>
	<main>

		<section class="about-edit">
			<h1>About Section</h1>
			<table class="paragraphs-table">
				<tr>
					<th>Paragraph</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<tr>
					<td>
						<p>
							I am a highly motivated full-stack web developer in training with a keen interest in PHP
							development. I am currently studying at the Mayden Academy in Bath. I have recently attained my
							BSc in Computing and IT (Software) from the Open University, this is where I decided to embark
							on a career as a Software Engineer.
						</p>
					</td>
					<td>
						<a href="editParagraph.php"><button>Edit</button></a>
					</td>
					<td>
						<form action="" method="post">
							<input type="submit" value="Delete" name="delete_item">
						</form>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							In my spare time I enjoy learning new creative skills which require me to use my hands and
							combine multiple ideas to form new creations. In recent years I have taught myself how to sew, knit
							and crochet. When I am not working or indulging in my hobbies you will find me providing support
							to young people in semi independence accommodation.
						</p>
					</td>
					<td>
						<a href="editParagraph.php"><button>Edit</button></a>
					</td>
					<td>
						<form action="" method="post">
							<input type="submit" value="Delete" name="delete_item">
						</form>
					</td>
				</tr>
			</table>
			<a href="addParagraph.php"><button class="new-paragraph-button">Add</button></a>
		</section>

	</main>

</body>
</html>