<?php include_once "header.php"; 
session_start();
$message = isset($_SESSION['flash']) ? $_SESSION['flash'] : '';

// Afficher le message dans le HTML
print_r($message) ; 
unset($_SESSION['flash']); // Supprimer le message de la session?>

<div class="titre">
    <h1>ECF BACK</h1>
</div>


<?php include_once "footer.php"; ?>