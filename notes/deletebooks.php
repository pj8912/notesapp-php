<?php

if(isset($_GET['bid'])){
	$bid = $_GET['bid'];
	require_once '../database/sql.php';
	$db = new database('../notesapp.db');
	$db->query('BEGIN');
	$s1 = "DELETE FROM books WHERE b_id = '$bid'";
		$db->query($s1);
	$s2 = "DELETE FROM notes WHERE b_id = '$bid'";
		$db->query($s2);
	$db->query('COMMIT');
	header('Location: ../index.php');
	exit();

}



