<?php


	/**
	 * This function retrieves an array of paragraph with their associated id's where
	 * their associated deleted field is set to 0.
	 *
	 * @param PDO $db as input
	 *
	 * @return array or paragraphs with their associated id's
	 */
	function getAboutMe (PDO $db) : array {
		$query = $db->prepare('SELECT `id`, `paragraph` FROM `paragraphs` WHERE `deleted` = 0;');
		$query->execute();
		return $query->fetchAll();
	}

	/**
	 * This function accepts an array of paragraphs and formats them for viewing as a string.
	 *
	 * @param array $paragraphs as input
	 *
	 * @return string which is all the paragraphs from the database for viewing
	 */
	function viewParagraphs (array $paragraphs) : string {
		$string = '';
		foreach ($paragraphs as $paragraph) {
			if (!in_array('', $paragraph) && array_key_exists('paragraph', $paragraph)) {
				$string .= '<p>' . $paragraph['paragraph'] . '</p>';
			}
		}
		return $string;
	}