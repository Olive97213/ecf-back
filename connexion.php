
<?php 

include_once "header.php";
require_once "include/db.php";

session_start();
$message = isset($_SESSION['flash']) ? $_SESSION['flash'] : '';



// Afficher le message dans le HTML
print_r($message) ; 
unset($_SESSION['flash']); // Supprimer le message de la session
?>
<link rel="stylesheet" href="link/connexion.css">


<div class="connexion">
    <h2>Connexion</h2>
    <form method="POST" action="action/login.php">
        <label for="email">Adresse e-mail :</label>
        <input type="email" name="email" id="email"><br><br>

        <label for="password">Mot de passe : </label>
        <input type="password" name="mp" id="password"><br><br>

        <input type="submit" value="Se connecter" name="submit">
        <a href="inscription.php">
            <p>S'inscrire</p>
        </a>
    </form>
    
   

</div>

<?php include_once "footer.php"; ?>