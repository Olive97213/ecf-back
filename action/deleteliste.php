<?php
require_once '../include/db.php';

// Récupérer l'identifiant de la liste de souhaits à supprimer
$idListe = $_GET['id'];

// Supprimer les enregistrements associés dans listedesouhait_has_article
$query = "DELETE FROM listedesouhait_has_article WHERE listeDeSouhait_idlisteDeSouhait = :idliste";
$statement = $pdo->prepare($query);
$statement->execute([':idliste' => $idListe]);

// Supprimer la liste de souhaits
$query = "DELETE FROM listeDeSouhait WHERE idlisteDeSouhait = :idliste";
$statement = $pdo->prepare($query);
$statement->execute([':idliste' => $idListe]);

// Rediriger vers une page appropriée après la suppression
header("Location: ../profil.php");
exit();
?>
