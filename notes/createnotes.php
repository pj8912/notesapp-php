<?php

include_once '../includes/header.php';
include_once '../includes/footer.php';
include_once '../includes/navbar.php';
?>

<?php main_header('View Notebook'); ?>
<?php main_navbar();
?>

<link rel="stylesheet" href="css/createnotes.css">
<?php
// require_once '../database/sql.php';
// $db = new database('../notesapp.db');

if (isset($_REQUEST['bid'])) {
    $bid = $_REQUEST['bid'];

    function getTitle()
    {
        require_once '../database/sql.php';
        $db = new database('../notesapp.db');
        $bid =   $_REQUEST['bid'];
        $sql = "SELECT name from notebooks WHERE nb_id = '$bid'";
        $res = $db->query($sql);
        while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
            return $row['name'];
        }
    }
}
?>
<div class="wrapper">
    <div class="box1 fullnav">


        <div class="navbar">
            <span class="h5"><?php echo getTitle(); ?></span>
            <div class="nav justify-content-end">
                <a style="" class="btn btn-primary ml-auto rounded-5 btn-sm m-1 " data-bs-toggle="tooltip" data-bs-placement="left" title="edit book details" href="../books/editbook.php?bid=<?php echo $bid; ?>">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                    </svg>
                </a>
                <a style="" class="btn btn-danger ml-auto rounded-5 btn-sm  m-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="delete book" href="../books/editbook.php?bid=<?php echo $bid; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                    </svg>

                </a>
            </div>
        </div>
        <hr>
        <div class="navbar">

            <span class="h5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                </svg>
                Notes</span>
            <!-- data-bs-toggle="modal" data-bs-target="#staticBackdrop" -->
            <!-- href="note_name/create_name.php?bid -->
            <div class="nav justify-content-end">

                <button type="button" class="btn btn-secondary btn-default rounded-5 btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <svg width=" 1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                    </svg>
                    Add Note
                </button>

                <!-- Modal -->
                <div class="modal fade mt-5" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Create Notes</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="m-auto">
                                    <p class="text-center">Create Note Name</p>
                                    <form action="note_name/create_name.php" method="post">
                                        <div class="mb-2">
                                            <input type="text" name="note-name" class="form-control" placeholder="name">
                                        </div>
                                        <div class="d-grid gap-2">
                                            <input type="hidden" name="cnx" value="<?php echo $_REQUEST['bid']; ?>">
                                            <button type="submit" class="btn btn-primary rounded-5" name="ubtn">create note name</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- line -->
                <div class="vl m-1"></div>

                <button class="btn btn-light  btn-sm m-1 rounded-5" data-bs-toggle="tooltip" data-bs-placement="left" title="Record Video">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                    </svg>
                </button>

                <button class="btn btn-light  btn-sm m-1 rounded-5" data-bs-toggle="tooltip" data-bs-placement="left" title="Record Video">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z" />
                    </svg>
                </button>


                <button class="btn  btn-light btn-sm m-1 rounded-5" data-bs-toggle="modal" data-bs-target="#staticAudio">
                    <svg data-bs-toggle="tooltip" data-bs-placement="left" title="Record Audio" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic-fill" viewBox="0 0 16 16">
                        <path d="M5 3a3 3 0 0 1 6 0v5a3 3 0 0 1-6 0V3z" />
                        <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z" />
                    </svg>
                </button>
                <div class="modal fade mt-5" id="staticAudio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Record Audio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="m-auto">
                                    <form action="note_name/create_name.php" method="post">
                                        <div class="mb-2">
                                            <input type="text" name="note-name" class="form-control" placeholder="Note Name">
                                        </div>
                                        <div id="controls" align="center" class="mb-2 mt-3 card card-body">
                                            <button class="btn btn-primary rounded-5" id="recordButton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
                                                    <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0v5zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3z" />
                                                </svg>


                                                Record


                                            </button>



                                            <button type="button" class="btn btn-secondary rounded-5 " id="pauseButton" disabled>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pause-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5z" />
                                                </svg>
                                                Pause
                                            </button>


                                            <button id="stopButton" disabled class="btn btn-danger rounded-5 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stop-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3z" />
                                                </svg>
                                                Stop
                                            </button>

                                            <br>
                                            <div>
                                                <ul class="p-5" id="recordingList"></ul>
                                            </div>
                                            <script src="js/audio.js"></script>
                                            <script src="js/recorder.js"></script>

                                        </div>
                                        <div class="mt-3 d-grid gap-2">
                                            <input type="hidden" name="cnx" value="<?php echo $_REQUEST['bid']; ?>">
                                            <button type="submit" class="btn btn-success rounded-5" name="ubtn">Upload</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>


        <hr>
        <div class="nav flex-column  nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <?php
            require '../database/sql.php';
            $db = new database('../notesapp.db');
            // $bid = $_REQUEST['bid'];
            $sql = "SELECT COUNT(*) FROM notes WHERE book_id = '$bid'";
            $res = $db->query($sql);
            if ($res) {
                $sql = "SELECT * FROM notes WHERE book_id = '$bid'";
                $response = $db->query($sql);


                while ($row = $response->fetchArray(SQLITE3_ASSOC)) {


                    echo '<div class="card card-body" style="display:flex;flex-direction:row;">
			<a id="notename"  href="createnotes.php?bid=' . $row['book_id'] . '&nid=' . $row['n_id'] . '&name=' . $row['note_name'] . '"  class="text-secondary  p-1 w-100" >
	
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-text-sidebar-reverse" viewBox="0 0 16 16">
            <path d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z"/>
            <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h2zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5V1z"/>
          </svg>                    
    
            ';
                    echo $row['note_name'] . ' 
			       
			</a>	
            <a href="deleteNotes.php?nid=' . $row['n_id'] . '&bid=' . $row['book_id'] . '" style="margin-left:auto;padding-left:1px">
            <svg width="1.4em" height="2em" viewBox="0 0 16 16" class="bi bi-trash ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg>
            </a>
            </div> <br>';
                }
            } else {
                echo 'No Notes Created';
            }
            ?>
        </div>
    </div>

    <div class="box2">

        <?php
        if (isset($_REQUEST['bid'])) {
            $bid = $_REQUEST['bid'];
            require '../database/sql.php';
            $db = new database('../notesapp.db');
            $sql = "SELECT * FROM notes WHERE b_id = '$bid'";
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


                        // $note_type = $row['note_type'];
                        echo ' <form action="uploadNotes.php" method="post" enctype="multipart/form-data">
          
                        <div class="mb-2"> 
                      <textarea cols="80"   class="form-control rounded-0" name="editor2" rows="10" style="height:inherit" >
                      ' . $notes . '
                      </textarea>
                      
                      </div>
                      <div class="d-grid gap-2 ">
                        <button class="btn btn-success   rounded-0" type="submit" name="s-btn">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                        </svg>
                            Save notes
                         </button>
                         <input type ="hidden" value="' . $nid . '" name="nid">
                         <input type ="hidden" value="' . $bid . '" name="bid">
                         </div>
                          </form>
                          </div>
                      ';
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
                echo 'No notes created';
            }
        }
        ?>
    </div>
</div>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script> -->
<!-- <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> -->
<!-- <script src="../ckeditor-html5-video-master/html5video/plugin.js"></script> -->
<script src="http://localhost:4000/ckeditor/ckeditor.js"></script>
<script>
    var nbtn = document.getElementById('noteids');
    var ndiv = document.getElementById('note-div');



    CKEDITOR.replace('editor2', {
        height: 500,
        /* Default CKEditor 4 styles are included as well to avoid copying default styles. */


        extraPlugins: 'html5video,html5audio,uploadfile',
        // extraPlugins: 'recordmp3js'
    })
</script>
<?php main_footer(); ?>