<?php
	/**
	 * * This Function updates the deleted field of the selected paragraph with the given id to 1
	 *
	 * @param PDO $db accepts a valid database connection.
	 * @param int $id accepts a valid id
	 */
	function deleteParagraph (PDO $db, int $id) : void {
		$query = $db->prepare("UPDATE `paragraphs` SET `deleted` = 1 WHERE `id` = :id;");
		$query->execute(['id'=>$id]);

		header("Location: dashboard.php");
	}
