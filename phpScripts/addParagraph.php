<?php


	/**
	 * This function takes a string submitted from a form and inserts it into the database
	 *
	 * @param PDO $db accepts a db connection variable as an input
	 * @param string $paragraph accepts a string submitted via a form as an input
	 * @return String confirmation message
	 */
	function addParagraph (PDO $db, string $paragraph) : String {
		if ($paragraph === '') {
			return 'Please enter a paragraph';
		} else {
			$query = $db->prepare("INSERT INTO `paragraphs` (`paragraph`) VALUES (:paragraph);");
			$query->execute(['paragraph'=>$paragraph]);
			return 'Your Paragraph has been saved';
		}
	}




