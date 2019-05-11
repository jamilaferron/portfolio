<?php

/**
 * This function checks the length of a given input and return and boolean
 * @param string $input
 * @return bool returns false if the string length is empty or greater than 400 characters
 */
function checkInputLength (string $input) {
	if($input === '' || strlen($input) > 400){
		return false;
	} else {
		return true;
	}
}