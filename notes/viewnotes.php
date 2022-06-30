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
	<a href="deleteNotes.php?nid='.$row['n_id'].'&bid='.$row['book_id'].'" class="btn btn-light rounded-5">
	
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
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
