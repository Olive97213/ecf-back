<?php
require_once '../include/db.php';

// Récupérer l'identifiant de la liste de souhaits à supprimer
$idListe = $_GET['id'];

// Désactiver les contraintes de clé étrangère temporairement
$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');

// Supprimer les enregistrements associés dans listedesouhait_has_article
$query = "DELETE FROM listedesouhait_has_article WHERE listeDeSouhait_idlisteDeSouhait = :idliste";
$statement = $pdo->prepare($query);
$statement->execute([':idliste' => $idListe]);

// Supprimer les commentaires associés à la liste de souhaits
$query = "DELETE FROM commentaire WHERE listeDeSouhait_idlisteDeSouhait = :idliste";
$statement = $pdo->prepare($query);
$statement->execute([':idliste' => $idListe]);

// Supprimer la liste de souhaits
$query = "DELETE FROM listeDeSouhait WHERE idlisteDeSouhait = :idliste";
$statement = $pdo->prepare($query);
$statement->execute([':idliste' => $idListe]);

// Réactiver les contraintes de clé étrangère
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

// Rediriger vers une page appropriée après la suppression
header("Location: ../adminListe.php");
exit();
?>
