<?php

$pdo = new PDO('mysql:host=localhost;dbname=liste_de_souhaits', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

