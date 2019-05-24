<?php
/**
 * This function retrieves an array of paragraphs with their associated id's where
 * their associated deleted field is set to 0.
 *
 * @param PDO $db as input
 *
 * @return array or paragraphs with their associated id's
 */
function getParagraphs (PDO $db) : array {
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
function displayParagraphsTableRow (array $paragraphs) : string {
	$string = '';
	foreach ($paragraphs as $paragraph) {
		if (!in_array('', $paragraph) && array_key_exists('id', $paragraph) && array_key_exists('paragraph', $paragraph)) {
			$string .= '<tr>
					<td>
						<p>' . $paragraph['paragraph'] . '</p>
					</td>
					<td>
					
						<a href="#" class="btn btn-primary text-uppercase font-weight-bold add-button" data-toggle="modal" data-target="#editParagraphModal'.$paragraph['id'].'">
							Edit
						</a>
					</td>
					<td>
						<form action="dashboard.php" method="POST">
							<input type="hidden" name="paragraphId" value="'. $paragraph['id'] .'">
							<input class="btn btn-primary text-uppercase font-weight-bold" type="submit" value="Delete" name="delete_item">
						</form>
					</td>
				</tr>';
		}
	}
	return $string;
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

/**
 * This function takes a string submitted from a form and inserts it into the database
 *
 * @param PDO $db accepts a db connection variable as an input
 * @param string $paragraph accepts a string submitted via a form as an input
 * @return String confirmation message
 */
function addParagraph (PDO $db, string $paragraph) : String {
	$query = $db->prepare("INSERT INTO `paragraphs` (`paragraph`) VALUES (:paragraph);");
	$query->execute(['paragraph'=>$paragraph]);
	return 'Your Paragraph has been saved';
}

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
 * This function accepts an array of paragraphs and formats them for viewing as a table.
 *
 * @param array $paragraphs as input
 *
 * @return string which is all the paragraphs from the database for viewing as a table
 */
function displayEditParagraphModal (array $paragraphs) : string {
	$string = '';
	foreach ($paragraphs as $paragraph) {
		if (!in_array('', $paragraph) && array_key_exists('id', $paragraph) && array_key_exists('paragraph', $paragraph)) {
			$string .= '<div class="modal fade" id="editParagraphModal'.$paragraph['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Edit Paragraph</h5>
										<button class="close" type="button" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<form method="POST" action="dashboard.php" class="edit-form">
										<div class="modal-body">
											<div class="form-group">
												<textarea class="form-control" name="edit-paragraph" rows="3">'.$paragraph['paragraph'].'</textarea>
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
											<form action="dashboard.php" method="POST">
												<input type="hidden" name="paragraphId" value="'. $paragraph['id'] .'">
												<input class="btn btn-primary text-uppercase font-weight-bold" type="submit" value="Edit" name="edit_submit">
											</form>
										</div>
									</form>
								</div>
							</div>
						</div>';
		}
	}
	return $string;
}