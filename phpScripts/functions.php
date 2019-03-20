<?php
	/**
	 * This function retrieves an array of paragraphs with their associated id's where
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
	 * This function accepts an array of paragraphs and formats them for viewing as a table.
	 *
	 * @param array $paragraphs as input
	 *
	 * @return string which is all the paragraphs from the database for viewing as a table
	 */
	function displayTableRow (array $paragraphs) : string {
		$string = '';
		foreach ($paragraphs as $paragraph) {
			if (!in_array('', $paragraph) && array_key_exists('id', $paragraph) && array_key_exists('paragraph', $paragraph)) {
				$string .= '<tr>
					<td>
						<p>' . $paragraph['paragraph'] . '</p>
					</td>
					<td>
						<form action="editParagraph.php" method="POST">
							<input type="hidden" name="paragraphId" value="'. $paragraph['id'] .'">
							<input type="submit" value="Edit" name="edit_item">
						</form>
					</td>
					<td>
						<form action="dashboard.php" method="POST">
							<input type="hidden" name="paragraphId" value="'. $paragraph['id'] .'">
							<input type="submit" value="Delete" name="delete_item">
						</form>
					</td>
				</tr>';
			}
		}
		return $string;
	}

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