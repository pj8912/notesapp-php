<?php

function main_navbar(){
echo '	
	<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">NotesApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
       </ul>
       <ul class="navbar-nav justify-content-end mb-2 mb-lg-0">
       <li class="nav-item m-1">
          <a class="nav-link btn btn-light text-dark btn-sm rounded-5" style="font-size:14px;"   href="http://localhost:4000/notebooks/view_notebooks.php">View NoteBooks</a>
        </li>
        <li class="nav-item m-1">
        <a class="nav-link btn btn-light text-dark  btn-sm rounded-5"  style="font-size:14px;"  href="http://localhost:4000/notebooks/create.php">Create NoteBook</a>
      </li>
	<div class="dropdown">
  		<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
   		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
</svg>
  	
		</a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    
    <li><a class="dropdown-item" href="#">
		 <a class="nav-link btn btn-light text-dark btn-sm rounded-5" style="font-size:14px;"   href="http://localhost:4000/notebooks/view_notebooks.php">View NoteBooks</a>
	</a></li>
    

<li><a class="dropdown-item" href="#">

		  <a class="nav-link btn btn-light text-dark  btn-sm rounded-5"  style="font-size:14px;"  href="http://localhost:4000/notebooks/create.php">Create NoteBook</a>
	</a></li>
  </ul>
</div>

      </ul>
   
   
    </div>
  </div>
  </nav>
';
}
