<?php
include_once "includes/header.php";
include_once "includes/footer.php";
include_once "includes/navbar.php";
?>



<?php main_header(); ?>

<style>
	.texts {
		text-decoration: none;
	}
	.new-btn{
		background:green;
		color:white;
		padding:5px;
		border: None;
		border-radius: 5px;
		width:inherit;
		height:fit-content;
		margin: 5px;
		text-decoration: none;
		font-size: 14px;
		text-align: center;
		margin-left: 15px;
	}
	.new-btn:hover{
		color:white;
	}
	.wrapper{
    display: grid;
    grid-gap: 1em;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: auto;
	padding: 10px;
	margin-top:10px;

  }
</style>

<?php main_navbar(); ?>

<div class="container">
	<div class="mt-5">

	<div  style="display:flex;flex-direction:row">

		
		<h3 class="text-secondary">

		Notebooks
	</h3>
	<!-- notebooks/create.php -->
	<a class="new-btn" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
	<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
					<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
					<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
				</svg> 
  			New
			</a>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  <p class="h5" style="display:flex; flex-direction:row">
	  <span class="m-1	">
	  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
					<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
					<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
				</svg> 
	 Create New NoteBook
</span>
	  <button type="button" class="btn-close" style="margin-left:auto" data-bs-dismiss="modal" aria-label="Close"></button>


	</p>
		<form action=" <?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<div class="mb-2">
				<input class="form-control" placeholder="Book Name" name="book_name">
			</div>
			<div class="mb-2">
				<!-- <textarea type="text" rows="5" cols="10" name="desc" class="form-control">
				</textarea> -->
				<textarea name="desc" class="form-control" placeholder="Description" cols="30" rows="5"></textarea>
			</div>
			<div class="d-grid gap-2">
				<button type="submit" name="ubtn" class="btn btn-primary rounded-0">Create</button>
			</div>
		</form>

      </div>
      
    </div>
  </div>
</div>

			
		</div>
		

<div class="wrapper">
<?php
		
		require_once('database/sql.php');
		
		$db = new database('notesapp.db');
		if (!$db) {
			die('Error opening database');
		}
		
		$sql = "SELECT * FROM notebooks";
		$response = $db->query($sql);
		if (!$response) {
			die('Error executing query');
		}

while ($row  = $response->fetchArray(SQLITE3_ASSOC)) {

	echo '<div style="border: 1px solid silver;padding:8px;width:inherit;border-radius:20px;height:fit-content"  id="box">';

	echo '<ul class="nav" style="display;flex;flex-direction:row;">';

	echo '<a href="../notes/createnotes.php?bid='.$row['nb_id'].'" class="nav-item" style="text-decoration:none;">
	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-book-fill" viewBox="0 0 16 16">
	<path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
  </svg> 

<span style="font-weight:bold;margin-left:10px;">' . $row['name'] . '</span></a>';


echo '</ul>';


   echo '<p class="mt-2 text-secondary p-1" style="font-size:14px">' . $row['desc'] . '</p>';



		echo '</div>';
	}

?>
		


		</div>



	</div>


</div>


<?php main_footer(); ?>

</body>

</html>

<?php
if(isset($_POST['ubtn'])){
	$bookname = $_POST['book_name'];
	$desc = $_POST['desc'];
	$db = new SQLite3("notesapp.db");
	// $db = new SQLite3("notesapp.db");
	$db->exec("INSERT INTO notebooks(name,desc) VALUES('$bookname','$desc')");
	header('Location: http://localhost:4000/');
	exit();

}

?>