<?php


if (isset($_POST['ubtn'])) {


    $name = htmlentities($_POST['book_name']);
    $desc = htmlentities($_POST['desc']);

    require '../database/sql.php';
    $db = new database('../notesapp.db');


    $sql = "INSERT INTO notebooks(name,desc) VALUES('$name', '$desc')";
    $db->query($sql);
    header('Location: view_notebooks.php');
    exit();
}

