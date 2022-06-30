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
	
  </div>
  </nav>
';
}
