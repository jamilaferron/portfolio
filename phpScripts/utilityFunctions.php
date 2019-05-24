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


/**
 * This function checks that all images are sutable for uploading
 * @param array $file of the information stored in the $_FILES super global
 * about a file.
 * @param string $target_file which represents the file path of where the
 * file is to be stored
 * @return int of 1 or 0 for if a file should be uploaded.
 */
function fileCheck(array $file , string $target_file){
	if ($file["name"] !== ""){
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		$check = getimagesize($file["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;

		} else {
			$uploadOk = 0;
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			$uploadOk = 0;
		}

		// Check file size
		if ($file["size"] > 500000) {
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			$uploadOk = 0;
		}
		return $uploadOk;
	}
}