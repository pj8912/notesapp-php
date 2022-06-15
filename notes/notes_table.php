<?php
require './database/sql.php';


$db = new database('./notesapp.db');

$table = "CREATE TABLE IF NOT EXISTS  notes(
    n_id INTEGER PRIMARY KEY AUTOINCREMENT,
    note_name TEXT NOT NULL,
    book_id INTEGER NOT NULL,
    notes TEXT ,
    note_type TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(book_id) REFERENCES notebooks(nb_id)
)";

$db->query($table);
// $db->close();
