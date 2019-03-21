<?php

	$loggedIn = $_SESSION['loggedIn'];

	/**
	 * This function checks the value of a variable $loggedIn which is set to a session object.
	 * if the variable is false the page it redirected but to the login page.
	 *
	 * @param $loggedIn
	 */
	function check_loggedIn($loggedIn) : void {
		if ($loggedIn == false){
			header('Location: login.php');
		}
	}
