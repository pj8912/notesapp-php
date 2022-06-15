<?php

include_once '../includes/header.php';
include_once '../includes/footer.php';
include_once '../includes/navbar.php';
?>

<?php main_header('Create Notebook'); ?>
<?php main_navbar(); ?>
<div class="contanier">

	<div class="col-md-4 mt-5 m-auto card card-body">

	<p class="h5">Create Notebook</p>
		<form action="create_script.php" method="post">
			<div class="mb-2">
				<input class="form-control" placeholder="Book Name" name="book_name">
			</div>
			<div class="mb-2">
				<!-- <textarea type="text" rows="5" cols="10" name="desc" class="form-control">
				</textarea> -->
				<textarea name="desc" class="form-control" placeholder="Description" cols="30" rows="10"></textarea>
			</div>
			<div class="d-grid gap-2">
				<button type="submit" name="ubtn" class="btn btn-success rounded-0">Create</button>
			</div>
		</form>



	</div>

	<?php main_footer(); ?>