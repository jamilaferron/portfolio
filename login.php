<?php
	session_start();
	require_once 'phpScripts/login.php';

	if(!isset($_SESSION['loggedIn'])) {
		$_SESSION['loggedIn'] = false;
	}

	$loggedIn = $_SESSION['loggedIn'];

	if($loggedIn === true) {
		header('Location: dashboard.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/login.css" type="text/css">

	<script src="js/jquery-3.3.1.min.js" defer></script>
	<script src="js/bootstarp.bundle.min.js" defer></script>
</head>
<body>
<div class="container-fluid">
	<div class="row no-gutter">
		<div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
		<div class="col-md-8 col-lg-6">
			<div class="login d-flex align-items-center py-5">
				<div class="container">
					<div class="row">
						<div class="col-md-9 col-lg-8 mx-auto">
							<h3 class="login-heading mb-4">Welcome back!</h3>
							<form method="post" action="dashboard.php">
								<div class="form-label-group">
									<input type="text" id="inputUsername" name="userName" class="form-control" placeholder="Email address" required autofocus>
									<label for="inputUsername">Username</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
									<label for="inputPassword">Password</label>
								</div>
								<button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-2 btn-signin" type="submit" name="login">Sign in</button>
								<div class="text-center">
									<a class="small" href="index.php">Profile</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>