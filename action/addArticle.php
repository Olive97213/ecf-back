<?php
require_once '../include/db.php';

session_start();

if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['article']);
    $description = htmlspecialchars($_POST['description']);

    // Récupérer l'ID de l'utilisateur en cours
    $user = $_SESSION['utilisateur']->idutilisateur;

    // Ajouter l'article à la table 'article'
    $query = "INSERT INTO article (nom, description) VALUES (:nom, :description)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nom', $nom);
    $statement->bindValue(':description', $description);
    $statement->execute();

    // Récupérer l'ID de l'article nouvellement ajouté
    $idArticle = $pdo->lastInsertId();

    // Ajouter une entrée dans la table 'listedesouhait_has_article' pour lier l'article à la liste de souhait
    $query2 = "INSERT INTO listedesouhait_has_article (listedesouhait_idlisteDeSouhait, article_idArticle) VALUES (:idListeDeSouhait, :idArticle)";
    $statement2 = $pdo->prepare($query2);
    $statement2->bindValue(':idListeDeSouhait', $user);
    $statement2->bindValue(':idArticle', $idArticle);
    $statement2->execute();

    // Afficher un message de succès
    echo "L'article a été ajouté avec succès à la liste de souhaits.";

    // Rediriger vers une autre page ou afficher d'autres informations
}




