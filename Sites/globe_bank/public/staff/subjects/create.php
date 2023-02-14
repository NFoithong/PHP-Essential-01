<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {
	
	// Handle form values sent by new.php
	// super Global $_POST['']
	$menu_name = $_POST['menu_name']  ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';

	// echo "Form parameters<br />";
	// echo "Menu name: " . $menu_name . "<br />";
	// echo "Position: " . $position . "<br />";
	// echo "Visible: " . $visible . "<br />";
	
	// query database below now in query function.php
	// // use form data to create records
	// $sql = "INSERT INTO subjects ";
	// $sql .= "(menu_name, position, visible)";
	// $sql .= "VALUES (";
	// $sql .= "'" . $menu_name . "',";
	// $sql .= "'" . $position . "',";
	// $sql .= "'" . $visible . "'";
	// $sql .= ")";
	// $result = mysqli_query($db, $sql);
	
	// // For insert statements , $result is true/false
	// if($result) {
		// $new_id = mysqli_insert_id($db);
		// redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
	// } else {
		// // INSERT failed
		// echo mysqli_error($db);
		// db_disconnection();
		// exit;
	// }
	$result = insert_subject($menu_name, $position, $visible);
	$new_id = mysqli_insert_id($db);
	redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
	
} else {
	redirect_to(url_for('/staff/subjects/new.php'));
}

?>