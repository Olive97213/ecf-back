<?php

$pdo = new PDO('mysql:host=localhost;dbname=wish', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

