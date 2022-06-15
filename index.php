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
</style>

<?php main_navbar(); ?>

<div class="container">

	<div class="row mt-5">

		<div class=" p-5 card card-body col-md-4 text-center m-2">
			<a class="h4 texts" href="notebooks/create.php">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
					<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
					<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
				</svg>
				Create Notebook
			</a>
		</div>

		<!--
<div class="p-5 m-2  card card-body col-md-4 text-center">
View Notes</div> -->

		<div class="p-5 m-2 card card-body col-md-4 text-center">
			<a href="notebooks/view_notebooks.php" class="h4 texts"> View Notebooks </a>
		</div>
		<!-- <div class="p-5 m-2 card card-body col-md-4 text-center">
			<a href="notebooks/view_notebooks.php" class="h4 texts"> View Notebooks</a>
		</div> -->
	</div>
</div>


<?php main_footer(); ?>

</body>

</html>