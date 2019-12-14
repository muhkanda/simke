<?php

	require_once 'database.php';

	function getData() {
		global $conn;
		$result	= mysqli_query($conn, "SELECT * FROM tb_user");
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function addData() {
		global $conn;
	}

	function editData() {
		global $conn;
	}

	function deleteData() {
		global $conn;
	}
	
?>