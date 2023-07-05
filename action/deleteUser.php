<?php
require_once '../include/db.php';

session_start();

// On récupère l'id de l'utilisateur dans l'URL
$id = $_GET['id'];

// Supprimer les enregistrements associés dans la table listeDeSouhait_has_article
$query = "DELETE FROM listeDeSouhait_has_article WHERE listeDeSouhait_idlisteDeSouhait IN (SELECT idlisteDeSouhait FROM listeDeSouhait WHERE utilisateur_idutilisateur = :idutilisateur)";
$statement = $pdo->prepare($query);
$statement->execute([':idutilisateur' => $id]);

// Supprimer les listes de souhaits de l'utilisateur
$query = "DELETE FROM listeDeSouhait WHERE utilisateur_idutilisateur = :idutilisateur";
$statement = $pdo->prepare($query);
$statement->execute([':idutilisateur' => $id]);

// Supprimer l'utilisateur de la table utilisateur
$query = "DELETE FROM utilisateur WHERE idutilisateur = :idutilisateur";
$statement = $pdo->prepare($query);
$statement->execute([':idutilisateur' => $id]);

// Redirection après la suppression
if (isset($_SESSION['admin'])) {
	$_SESSION['flash'] = "L'utilisateur a bien été supprimé";
	header("Location: ../admin.php");
	exit();
} else {
	session_destroy();
	$_SESSION['flash'] = "Votre compte a bien été supprimé";
	header("Location: ../index.php");
	exit();
}
?>
