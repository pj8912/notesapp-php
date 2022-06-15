<?php

// require '../../../home/jp/php_test/includes/header.php';
require '../../includes/header.php';
require '../../includes/footer.php';
require '../../includes/navbar.php';
?>

<?php main_header('View Notebook'); ?>
<?php main_navbar(); ?>
<div class="card card-body mt-5 col-md-4 m-auto">
    <p class="text-center">Create Note Name</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="mb-2">
            <input type="text" name="note-name" class="form-control" placeholder="Video Name">
        </div>
        <div class="d-grid gap-2">
            <input type="hidden" name="cnx" value="<?php echo $_REQUEST['bid']; ?>">
            <button type="submit" class="btn btn-primary rounded-5" name="ubtn">create note name</button>
        </div>
    </form>
</div>






<?php

if (isset($_POST['ubtn'])) {
    $note = $_POST['note-name'];
    $bid = $_POST['cnx'];
    include '../../database/sql.php';
    $db = new database('../../notesapp.db');

    $sql = "INSERT INTO notes(note_name, book_id) VALUES('$note', '$bid')";
    $db->query($sql);
    header("Location: ../createnotes.php?bid=$bid");
    exit();
}
