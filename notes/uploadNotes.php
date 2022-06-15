
<?php

if (isset($_POST['nid']) && isset($_POST['bid'])) {
    $nid = $_POST['nid'];
    $bid = $_POST['bid'];
    $notes = $_POST['editor2'];

    include '../database/sql.php';
    $db = new database('../notesapp.db');

    $sql = "UPDATE notes SET notes = '$notes' WHERE n_id='$nid' and book_id='$bid'";
    $db->query($sql);

    // $sql = "SELECT * FROM notes WHERE "
    header("Location: createnotes.php?bid=$bid");
    exit();
}
?>