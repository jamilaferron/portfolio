<?php


	/**
	 * This function creates a connection to the database
	 *
	 * @return PDO
	 */
	function dbConnection () : PDO {
		$result = new PDO('mysql:host=127.0.0.1; dbname=portfolio_cms', 'root', '');
		$result->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $result;
	}