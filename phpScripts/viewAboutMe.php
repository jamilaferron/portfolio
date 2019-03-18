<?php


	/**
	 * @param PDO $db
	 * @return array
	 */
	function getAboutMe (PDO $db) : array {
		$query = $db->prepare('SELECT `paragraph` FROM `paragraphs` WHERE `deleted` = 0;');
		$query->execute();
		return $query->fetchAll();
	}

	/**
	 * @param array $paragraphs
	 * @return string
	 */
	function viewParagraphs (array $paragraphs) : string {
		$string = '';
		foreach ($paragraphs as $paragraph) {
			if (!in_array('', $paragraph)) {
				$string .= '<p>' . $paragraph['paragraph'] . '</p>';
			}
		}
		return $string;
	}