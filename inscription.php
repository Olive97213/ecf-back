<?php include_once "header.php";
require_once "include/db.php";

$message = isset($_GET['message']) ? $_GET['message'] : '';

// Afficher le message dans le HTML
echo $message;?>
<link rel="stylesheet" href="link/inscription.css">




<div class="inscription">
    <h2>Inscription</h2>
    <form method="POST" action="action/register.php">

        <label for="nom">Nom :</label>
        <input type="texte" name="nom" id="nom"><br><br>

        <label for="email">Adresse e-mail :</label>
        <input type="email" name="email" id="email"><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="mp" id="password"><br><br>

        <input type="submit" value="S'inscrire" name="submit">

    </form>
</div>





<?php include_once "footer.php"; ?>