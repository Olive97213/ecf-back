<?php

require_once '../include/db.php';

session_start();

// on recupere l'id de l'utilisateur dans l'url
$id = $_GET['id'];

$query = "SELECT * FROM listeDeSouhait";


