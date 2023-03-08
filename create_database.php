<?php


$databaseFile = "notesapp.db";
if(file_exists($databaseFile)){

	echo 'Database file already exists'.PHP_EOL;
	exit;
}


$db = new SQLite3($databaseFile);

//create notebooks
$db->exec("CREATE TABLE IF NOT EXISTS  notebooks(
    nb_id INTEGER PRIMARY KEY AUTOINCREMENT,
    name  CHAR(100) NOT NULL,
    desc TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");


///create notes
$db->exec("CREATE TABLE IF NOT EXISTS notes(

    n_id INTEGER PRIMARY KEY AUTOINCREMENT,
    note_name TEXT NOT NULL,
    book_id INTEGER NOT NULL,
    notes TEXT ,
    note_type TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(book_id) REFERENCES notebooks(nb_id)

)");


$db->close();

echo "'notesapp.db', notebooks, notes tables created!".PHP_EOL;



