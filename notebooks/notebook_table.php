<?php
require './database/sql.php';


$db = new database('./notesapp.db');

$table = "CREATE TABLE IF NOT EXISTS  notebooks(
    nb_id INTEGER PRIMARY KEY AUTOINCREMENT,
    name  CHAR(100) NOT NULL,
    desc TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

$db->query($table);
// $db->close();
