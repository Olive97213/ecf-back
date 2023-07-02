<?php



if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);

    // Récupérer l'ID de l'utilisateur en cours
    $user = $_SESSION['utilisateur']->idutilisateur;

    $query = "INSERT INTO listeDeSouhait (nom, description, utilisateur_idutilisateur, createdAT) VALUES (:nom, :description, :utilisateur_idutilisateur, NOW())";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nom', $nom);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':utilisateur_idutilisateur', $user);
    $statement->execute();

   
} 



?>

