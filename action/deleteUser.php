<?php

require_once '../include/db.php';

session_start();
// on recupere l'id de l'utilisateur dans l'url
$id = $_GET['id'];
// on supprime l'utilisateur de la base de données
$query = "DELETE FROM utilisateur WHERE idutilisateur = :idutilisateur";
$statement = $pdo->prepare($query);
$statement->execute([':idutilisateur' => $id]);
// si l'utilisateur est un admin on le redirige vers la page admin
if (isset($_SESSION['admin'])) {

	$_SESSION['flash'] = "L'utilisateur a bien été supprimé";
	header("Location: ../admin.php");
	exit();

} else { // sinon on le redirige vers la page d'accueil

	session_destroy();
	$_SESSION['flash'] = "Votre compte a bien été supprimé";
	header("Location: ../index.php");
	exit();

}
