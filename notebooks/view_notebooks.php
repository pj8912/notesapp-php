<?php

include_once '../includes/header.php';
include_once '../includes/footer.php';
include_once '../includes/navbar.php';
?>

<?php main_header('View Notebook'); ?>
<?php main_navbar(); ?>
<div class="container">


    <div class="mt-5 row  p-4">
        <!-- <p class="h2">Notebooks</p> -->
        <div class="">
            <h2 class="m-2">NoteBooks</h2>
            <a href="create.php" class="rounded-5 btn btn-success btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"></path>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"></path>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"></path>
                </svg>
                Create Notebook
            </a>
        </div>
        <?php

        require '../database/sql.php';

        $db = new database('../notesapp.db');
        $sql = "SELECT * FROM notebooks";
        $response =  $db->query($sql);
        // $num = $response->ro`
        while ($row  = $response->fetchArray(SQLITE3_ASSOC)) {

            echo '<div class=" m-2 col-md-4 card card-body rounded-0" style="">';
            echo '<a href="../notes/createnotes.php?bid='.$row['nb_id'].'" class="text-center h4">' . $row['name'] . '</a>';
            echo '<div class="mt-2 text-secondary">' . $row['desc'] . '</div><br>';
            echo '<div class="m-auto">
            <a href="../notes/viewnotes.php?bid='.$row['nb_id'].'" class="btn btn-success rounded-5">View Notes</a> 
            <a href="../notes/createnotes.php?bid='.$row['nb_id'].'" class="btn btn-primary rounded-5">Create/Edit Notes</a>
            </div>';
            echo '</div>';
        }

        ?>
    </div>
</div>

<?php main_footer(); ?>