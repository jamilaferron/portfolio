<?php

	function dbConnection () : PDO {
		$result = new PDO('mysql:host=127.0.0.1; dbname=portfolio_CMS', 'root', '');
		$result->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $result;
	}