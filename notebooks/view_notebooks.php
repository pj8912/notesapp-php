<?php

include_once '../includes/header.php';
include_once '../includes/footer.php';
include_once '../includes/navbar.php';
?>

<?php main_header('View Notebook'); ?>
<style>
  #box{
    margin:10px;
    width:100%;
    word-wrap: break-word;
    height:fit-content;
  }
  .wrapper{
    display: grid;
    grid-gap: 1em;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 200px;
  }
</style>
<?php main_navbar(); ?>
<div class="container">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="mt-4 wrapper" >
    
        <?php

require_once('../database/sql.php');

$db = new database('../notesapp.db');
if (!$db) {
    die('Error opening database');
}

$sql = "SELECT * FROM notebooks";
$response = $db->query($sql);
if (!$response) {
  die('Error executing query');
}
        // $num = $response->ro`
        while ($row  = $response->fetchArray(SQLITE3_ASSOC)) {

		echo '<div class="card card-body "  id="box">';

		echo '<ul class="nav">';
	    echo '<a href="../notes/createnotes.php?bid='.$row['nb_id'].'" class="text-center h4 nav-item" style="text-decoration:none">
		    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-richtext" viewBox="0 0 16 16">
  <path d="M7.5 3.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047L11 4.75V7a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 7v-.5s1.54-1.274 1.639-1.208zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg> ' . $row['name'] . '</a>';
	
echo '<div class="dropdown ml-5 nav-item ">
  <a class=" dropdown-toggle nav-link" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
    
  </a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <li><a class="dropdown-item" type="button" href="http://localhost:4000/notes/viewnotes.php?bid='.$row['nb_id'].'">
	<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>
	
	See Notes
	</a></li>


    <li><a class="dropdown-item" type="button" href="http://localhost:4000/notes/createnotes.php?bid='.$row['nb_id'].'">
	<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
	Create&Edit
</a></li>

  </ul>
</div>';
	
	echo '</ul>';


	   echo '<div class="mt-2 text-secondary" style="font-size:12px">' . $row['desc'] . '</div><br>';
	   /**
            echo '<div class="m-auto">
            <a href="../notes/viewnotes.php?bid='.$row['nb_id'].'" class="btn btn-success rounded-5">View Notes</a> 
            <a href="../notes/createnotes.php?bid='.$row['nb_id'].'" class="btn btn-primary rounded-5">Create/Edit Notes</a>
	    </div>';**/


            echo '</div>';
        }

        ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script src="http://localhost:4000/bootstrap/js/bootstrap.js"></script>
   </div>
</div>

<?php 
	main_footer(); 
?>
