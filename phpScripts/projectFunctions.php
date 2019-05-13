<?php

/**
 * This function takes a string submitted from a form and inserts it into the database
 *
 * @param PDO $db accepts a db connection variable as an input
 * @param string $name accepts a string submitted via a form as an input
 * @param string $url accepts a string submitted via a form as an input
 * @param string $img accepts a string submitted via a form as an input
 * @return String confirmation message
 */
function addProject(PDO $db, string $name, string $img, string $live = NULL, string $repo = NULL){

	$query = $db->prepare("INSERT INTO `projects` (`name`,`live_link`,`repo_link`, `img`) VALUES (:name, :live, :repo, :img);");
	$query->execute(['name'=>$name, 'live'=>$live, 'repo'=>$repo,'img'=>$img]);
	return 'Your Project has been saved';
}

/**
 * * This Function updates the deleted field of the selected paragraph with the given id to 1
 *
 * @param PDO $db accepts a valid database connection.
 * @param int $id accepts a valid id
 */
function deleteProject (PDO $db, int $id) : void {
	$query = $db->prepare("UPDATE `projects` SET `deleted` = 1 WHERE `id` = :id;");
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
function editProject (PDO $db, int $id, string $name, string $img, string $live = NULL, string $repo = NULL): bool{
	$query = $db->prepare("UPDATE `projects` SET `name` = :name, `live` = :live, `repo` = :repo, `img` = :img WHERE `id` = :id;");
	return $query->execute(['name'=>$name, 'live'=>$live, 'repo'=>$repo,'img'=>$img, 'id'=>$id]);
}

/**
 * This function accepts an array of paragraphs and formats them for viewing as a string.
 *
 * @param array $projects as input
 *
 * @return string which is all the paragraphs from the database for viewing
 */
function viewProjects(array $projects) : string {
	$string = '';
	foreach ($projects as $project) {

			$string .= '<div class="project-container" style="background-image: url('.$project['img'].')">
	<div class="card-overlay">
		<div class="overlay-text">'.$project['name'].'</div>';
			if ($project['live_link'] != ""){
				$string .='<a target="_blank" href="'.$project['live_link'].'"><i class="project-urls fas fa-cloud-upload-alt fa-3x"></i></a>';
			}
		if ($project['repo_link'] != ""){
			$string .='<a target="_blank" href="'.$project['repo_link'].'"><i class="project-urls fab fa-github-square fa-3x"></i></a>';
		}

		$string .= '</div>
</div>';

	}
	return $string;
}

/**
 * This function accepts an array of paragraphs and formats them for viewing as a table.
 *
 * @param array $paragraphs as input
 *
 * @return string which is all the paragraphs from the database for viewing as a table
 */
function displayEditProjectModal (array $projects) : string {
	$string = '';
	foreach ($projects as $project) {
		if (!in_array('', $project) && array_key_exists('id', $project) && array_key_exists('name', $project)) {
			$string .= '<div class="modal fade" id="editProjectModal'.$project['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
										<button class="close" type="button" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<form method="POST" action="dashboard.php" class="editprojects-form" enctype="multipart/form-data">
										<div class="modal-body">
											<div class="form-group">
												<label for="project-name">Project Name</label>
												<input type="text" name="editProject-name" value="'.$project['name'].'">
											</div>
											<div class="form-group">
												<label for="project-url">Project Link</label>
												<input type="text" name="editProject-url" value="'.$project['url'].'">
											</div>
											<div class="form-group">
												<input type="hidden" name="hiddenImg" value="'. $project['img'] .'">
											</div>
											
											<div class="form-group">
												<label for="exampleFormControlTextarea1">Add Image</label>
												<input type="file" name="fileToUpload" id="fileToUpload">
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
											<form action="dashboard.php" method="POST">
												<input type="hidden" name="projectId" value="'. $project['id'] .'">
												<input class="btn btn-primary text-uppercase font-weight-bold" type="submit" value="Edit" name="editProject_submit">
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


/**
 * This function accepts an array of paragraphs and formats them for viewing as a table.
 *
 * @param array $paragraphs as input
 *
 * @return string which is all the paragraphs from the database for viewing as a table
 */
function displayProjectTableRow (array $projects) : string {
	$string = '';
	foreach ($projects as $project) {
		if (!in_array('', $project) && array_key_exists('id', $project) && array_key_exists('name', $project)) {
			$string .= '<tr>
					<td>
						<p>' . $project['name'] . '</p>
					</td>
					<td>
						<p>' . $project['url'] . '</p>
					</td>
					<td>
						<img src="'.$project['img'].'" alt="project_image" class="table-img">
					</td>
					<td>
						<a href="#" class="btn btn-primary text-uppercase font-weight-bold add-button" data-toggle="modal" data-target="#editProjectModal'.$project['id'].'">
							Edit
						</a>
					</td>
					<td>
						<form action="dashboard.php" method="POST">
							<input type="hidden" name="projectId" value="'. $project['id'] .'">
							<input class="btn btn-primary text-uppercase font-weight-bold" type="submit" value="Delete" name="deleteProject_item">
						</form>
					</td>
				</tr>';
		}
	}
	return $string;
}

/**
 * This function retrieves an array of paragraphs with their associated id's where
 * their associated deleted field is set to 0.
 *
 * @param PDO $db as input
 *
 * @return array or paragraphs with their associated id's
 */
function getProjects (PDO $db) : array {
	$query = $db->prepare('SELECT `id`, `name`, `live_link`, `repo_link`, `img` FROM `projects` WHERE `deleted` = 0;');
	$query->execute();
	return $query->fetchAll();
}




