<?php

include_once '../includes/header.php';
include_once '../includes/footer.php';
include_once '../includes/navbar.php';
?>

<?php main_header('View Notebook'); ?>
<?php main_navbar(); ?>
<link rel="stylesheet" href="css/createnotes.css">

<div class="wrapper">

    <div class="box1 fullnav">
        <?php
        if (isset($_REQUEST['bid'])) {
            $bid = $_REQUEST['bid'];
            require '../database/sql.php';
            $db = new database('../notesapp.db');
            $sql = "SELECT * FROM notebooks WHERE nb_id = '$bid'";
            $response =  $db->query($sql);
            while ($row  = $response->fetchArray(SQLITE3_ASSOC)) {
                $name = $row['name'];
                echo '  
                        <div class="navbar">
                            <span class="h4">' . $name . '</span>
                        </div>';
                echo ' <hr>
                        <h3 class="text-center">Notes</h3>
                        </hr>
                        ';
            }
            $sql = "SELECT * FROM notes WHERE book_id = '$bid' ";
            $response =  $db->query($sql);

            while ($row  = $response->fetchArray(SQLITE3_ASSOC)) {
                echo '<div class="card card-body" style="display:flex;flex-direction:row;">
                                    <a id="notename" href="viewnotes.php?bid=' . $row['book_id'] . '&nid=' . $row['n_id'] . '&name=' . $row['note_name'] . '"  class="text-secondary  p-1 w-100">
                                ';
                echo $row['note_name'] . ' </a>
                <a href="../notes/createnotes.php?bid=' . $row['book_id'] . '&nid='.$row['n_id'].'&name='.$row['note_name'].'" class="btn btn-light rounded-5">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
            </svg>
                 </a>
                </div><br>';
            }
        }
        //     }
        // }
        ?>
    </div>
    <div class="box2 card card-body">
        <?php
        if (isset($_REQUEST['bid'])) {
            $bid = $_REQUEST['bid'];
            require '../database/sql.php';
            $db = new database('../notesapp.db');
            // $sql = "SELECT * FROM notes WHERE b_id = '$bid'";
            $sql = "SELECT COUNT(*) as count FROM notes WHERE book_id = '$bid'";
            $res = $db->query($sql);
            $ress = $res->fetchArray();
            $numRows = $ress['count'];

            if ($numRows > 0) {



                if (isset($_REQUEST['nid']) && isset($_REQUEST['name'])) {
                    $nid = $_REQUEST['nid'];
                    $name = htmlspecialchars($_REQUEST['name']);
                    $sql = "SELECT * FROM notes WHERE n_id = '$nid' and book_id = '$bid' ";
                    $result = $db->query($sql);
                    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {

                        $notes = $row['notes'];
                        if (empty($notes)) echo '<div class="mt-5 p-2 text-center">Notes Empty!! <br>
                        <a href="../notes/createnotes.php?bid=' . $row['book_id'] . '&nid='.$row['n_id'].'&name='.$row['note_name'].'" class="btn btn-primary rounded-5">Create/Edit Notes</a></div>';
                        else
                            echo '<div class="p-2">
                            ' . $notes . '
                            </div>';
                    }
                } else {
                    $sql = "SELECT * FROM notebooks WHERE nb_id = '$bid'";
                    $result = $db->query($sql);
                    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                        echo '<div class="p-3">
                        <h5 class="text-center">' . $row['name'] . '</h5><hr>
                        ' . $row['desc'] . '</div>';
                    }
                }
            } else {
                $sql = "SELECT * FROM notebooks WHERE nb_id = '$bid'";
                $result = $db->query($sql);
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    echo '<div class="p-3">
                    <h5 class="text-center">' . $row['name'] . '</h5><hr>
                    ' . $row['desc'] . '</div>';
                }
                echo '<div class="m-auto">No notes created<br>
                <a href="../notes/createnotes.php?bid=' . $row['nb_id'] . '" class="btn btn-primary rounded-5">Create/Edit Notes</a>
                </div>';
            }
        }
        ?>

    </div>
</div>
<?php main_footer(); ?>