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
						<a href="editParagraph.php" class="button">Edit</a>
					</td>
					<td>
						<form action="dashboard.php" method="post">
							<input type="hidden" name="paragraphId" value="'. $paragraph['id'] .'">
							<input type="submit" value="Delete" name="delete_item">
						</form>
					</td>
				</tr>';
			}
		}
		return $string;
	}