<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_REQUEST['bid'])){

	$bid = $_REQUEST['bid'];
	
	require_once '../database/sql.php';
	
	$db = new database('../notesapp.db', SQLITE3_OPEN_READWRITE);
	$db->exec('BEGIN;');
	
	$s1 = "DELETE FROM notebooks WHERE nb_id = :nb_id ";
	$stmt = $db->prepare($s1);
	$stmt->bindParam(':nb_id', $bid);
	$stmt->execute();
	
	$s2 = "DELETE FROM notes WHERE book_id =:book_id";
	$stmt = $db->prepare($s2);
	$stmt->bindParam(':book_id', $bid);
	$stmt->execute();
	
	$db->exec('COMMIT;');
	
	header('Location: ../index.php');
	exit();

}



