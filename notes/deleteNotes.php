
<?php

if (isset($_REQUEST['nid']) && isset($_REQUEST['bid'])) {
    $nid = $_REQUEST['nid'];
    $bid = $_REQUEST['bid'];
    include '../database/sql.php';
    $db = new database('../notesapp.db');

    $sql = "DELETE FROM notes WHERE n_id='$nid' and book_id='$bid'";
    $db->query($sql);
    $uri = $_REQUEST['uri'];
    $host = $_SERVER['HTTP_POST'];
    // $sql = "SELECT * FROM notes WHERE "
    header("Location: $host$uri");
    exit();
}
?>
