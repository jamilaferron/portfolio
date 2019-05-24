<?php
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

	/**
	 * This function retrieves a single id based on the given username.
	 *
	 * @param PDO $db accepts a valid database connection
	 * @param string $name accepts the name of a user
	 *
	 * @return array with one associative array with key value pair of id => int
	 */
	function getUserId (PDO $db, string $name) : array {
		$query = $db->prepare("SELECT `id` FROM `users` WHERE `username` = :name ;");
		$query->execute(['name' => $name]);
		return $query->fetch();
	}

	/**
	 * This function accepts an array of id's and formats them as a string.
	 *
	 * @param array $id accepts an array of one id as input
	 *
	 * @return string which is the selected id from the database.
	 */
	function returnId (array $id) {
		$string = '';
		if (!in_array('', $id) && array_key_exists('id', $id)) {
			$string .= $id['id'];
		}
		return $string;
	}

	/**
	 * This function retrieves a single password based on the given id.
	 *
	 * @param PDO $db accepts a valid database connection
	 * @param string $id accepts the id of a user
	 *
	 * @return array with one associative array with key value pair of password => string
	 */
	function getPassword (PDO $db, string $id) : array {
		$query = $db->prepare("SELECT `password` FROM `users` WHERE `id` = :id ;");
		$query->execute(['id' => $id]);
		return $query->fetch();
	}

	/**
	 * This function accepts an array of passwords and formats them as a string.
	 *
	 * @param array $password accepts an array of one password as input
	 *
	 * @return string which is the selected password from the database.
	 */
	function returnPassword (array $password) {
		$string = '';
		if (!in_array('', $password) && array_key_exists('password', $password)) {
			$string .= $password['password'];
		}
		return $string;
	}

	/**
	 * This function accepts boolean veriabls which represents if a password has been verified
	 * and if a session is logged in, if this checks pass the session is set to logged in true
	 * if it fails it sets the logged in session to false and redirects the page.
	 *
	 * @param bool $verify a boolean value returned from a password check
	 *
	 * @param bool $loggedIn boolean value representing if a session is logged in.
	 */
	function login(bool $verify, bool $loggedIn){

		if ($verify === true || $loggedIn === true) {
			$_SESSION['loggedIn'] = true;
		} else {
			$_SESSION['loggedIn'] = false;
			header('Location: login.php');
		}
	}

	/**
	 * This function checks is a session logged in is set to true and sets it to false
	 * before redirecting the page.
	 *
	 * @param bool $loggedIn as session variable.
	 *
	 * @param $page
	 */
	function logout(bool $loggedIn, string $page) {
		if (isset($_POST['logout']) && $loggedIn === true) {
			$_SESSION['loggedIn'] = false;
			header('Location: ' . $page);
		}
	}

	/**
	 * This function accepts a boolen which represents if a session is logged in and a url for a page
	 * and displays a form with a button to logout.
	 *
	 * @param bool $loggedIn as session variable.
	 * @param string $page
	 *
	 * @return string
	 */
	function displayLoginButton(bool $loggedIn, string $page) {
		$string = '';
		if($loggedIn === true) {
			$string .= '<form method="post" action="'. $page .'" class="logout-button">
								<input class="btn-logout" type="submit" name="logout" value="Logout">
						</form>';
		}
		return $string;
	}