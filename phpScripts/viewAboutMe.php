<?php

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