<?php


require_once "include/function.php";
require_once 'include/db.php';

logged_only();


// on recupere tous les utilisateurs
$query = "SELECT * FROM utilisateur";
$statement = $pdo->prepare($query);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_OBJ);


include_once "header.php"; ?>


<h2>Créer une nouvelle liste de souhaits</h1><br>
    <form action="action/createWish.php" method="POST">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea><br>

        <input type="submit" name="submit" value="Créer la liste de souhaits">
    </form><br><br>

    <h2>Ajouter un article a une liste de souhait</h2><br>

    
    <?php require "action/wishSelection.php"; ?>

    <!-- <form action="action/addArticle.php" method="POST">
        <label for="article">Article :</label>
        <input type="text" id="article" name="article" required><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea><br>

        <input type="submit" name="submit" value="Ajouter article">
    </form><br><br>
        
</form><br><br> -->


