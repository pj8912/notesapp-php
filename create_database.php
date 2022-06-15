<?php


require_once 'database/sql.php';

$db = new database("notesapp.db");

if (!$db) {
    echo "err: Database does not exist";
}else{
    echo "Database created!!";
}
