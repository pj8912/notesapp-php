<?php

if (isset($_POST['ubtn'])) {
    $note = $_POST['note-name'];
    $bid = $_POST['cnx'];
    include '../../database/sql.php';
    $db = new database('../../notesapp.db');

    $sql = "INSERT INTO notes(note_name, book_id) VALUES('$note', '$bid')";
    $db->query($sql);

    // $sql = "SELECT * FROM notes WHERE "
    header("Location: ../createnotes.php?bid=$bid");
    exit();
}
?>