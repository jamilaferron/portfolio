<?php


	function getAboutMe (PDO $db) : array {
		$query = $db->prepare('SELECT `paragraph` FROM `paragraphs` WHERE `deleted` = 0;');
		$query->execute();
		return $query->fetchAll();
	}

	function viewParagraphs (array $paragraphs) : string {
		$result = '';
		foreach ($paragraphs as $paragraph) {
			if (!in_array('', $paragraph)) {
				$result .= '<p>' . $paragraph['paragraph'] . '</p>';
			}
		}
		return $result;
	}