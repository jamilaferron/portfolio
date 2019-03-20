<?php
	/**
	 * This function retrieves a single paragraph based on the given id.
	 *
	 * @param PDO $db accepts a valid database connection
	 * @param int $id accepts the id of a paragraph
	 *
	 * @return array with one associative array with key value pair of paragraph => text
	 */
	function getParagraph (PDO $db, int $id) : array {
		$query = $db->prepare('SELECT `paragraph` FROM `paragraphs` WHERE `id` = :id;');
		$query->execute(['id' => $id]);
		return $query->fetch();
	}


	/**
	 * This function updates the paragraph field of a selected row in the database where the id
	 * field is equal to the input $id using the input $text
	 *
	 * @param PDO $db accepts a valid database connection
	 * @param int $id accepts the id of a paragraph
	 * @param string $text accepts a string which is submitted from the edit form
	 *
	 * @return bool of true if the update is successful.
	 */
	function editParagraph (PDO $db, int $id, string $text): bool{
		$query = $db->prepare("UPDATE `paragraphs` SET `paragraph` = :new WHERE `id` = :id;");
		return $query->execute(['new'=>$text ,'id'=>$id]);
	}


	/**
	 * This function accepts an array of paragraphs and formats them for viewing as a string.
	 *
	 * @param array $paragraph accepts an array of one paragraph as input
	 * @return string which is the selected paragraph for editing from the database for viewing in the
	 * input field
	 */
	function displayParagraph (array $paragraph) : string {
		$string = '';
		if (!in_array('', $paragraph) && array_key_exists('paragraph', $paragraph)) {
			$string .=  $paragraph['paragraph'];
		}
		return $string;
	}

	/**
	 * This function accepts an array of paragraphs and formats them for viewing as a string.
	 *
	 * @param array $paragraph accepts an array of one paragraph as input
	 * @return string which is the selected paragraph for editing from the database for viewing in the
	 * input field
	 */
	function displayHiddenInput (int $id) : string {
		$string = '';
		if ($id < 0){
			$string = '';
		} else {
			$string .=  '<input type="hidden" name="textToEditId" value="' . $id .'">';
		}
		return $string;
	}