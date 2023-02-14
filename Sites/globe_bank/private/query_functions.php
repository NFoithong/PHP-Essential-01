<?php

	function find_all_subjects() {
		global $db;
		
		$sql = "SELECT * FROM subjects ";
		$sql .= "ORDER BY position ASC";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		return $result;
	}
	
	function find_subject_by_id($id) {
		global $db;
		
		$sql = "SELECT * FROM subjects ";
		$sql .= "WHERE id='" . $id . "'";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		
		$subject = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $subject; // return an assoc. array
	}
	
	function insert_subject($menu_name, $position, $visible) {
		global $db;
		
		$sql = "INSERT INTO subjects ";
		$sql .= "(menu_name, position, visible) ";
		$sql .= "Values (";
		$sql .= "'" . $menu_name . "',";
		$sql .= "'" . $position . "',";
		$sql .= "'" . $visible . "'";
		$sql .= ")";
		$result = mysqli_query($db, $sql);
		
		// For insert statements, $result is true/false
		if($result) {
			return true;
		} else {
			// insert failed
			echo mysqli_error($db);
			db_disconnetion($db);
			exit;
		}
	}
	
	function find_all_pages() {
		global $db;
		
		$sql = "SELECT * FROM pages ";
		$sql .= "ORDER BY position ASC";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		return $result;
	}

?>