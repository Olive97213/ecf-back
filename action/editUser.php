<?php

require_once '../include/db.php';

session_start();

// on recupere l'id de l'utilisateur dans l'url
$id = $_GET['id'];

// on recupere les données du formulaire
if (isset($_POST['edit'])) {
	
	$nom = $_POST['nom'];
	$mail = $_POST['email'];
	$mp = $_POST['mp'];
	$role = $_POST['role'];

	
	// si l'utilisateur est un admin 
	if (isset($_SESSION['admin'])) {
		// on recupere le role de l'utilisateur
		$role = intval($_POST['role']);
		// on modifie l'utilisateur dans la base de données
		$query = "UPDATE utilisateur SET nom = :nom, email = :email, mp = :mp, role = :role WHERE idutilisateur = :idutilisateur";
		$statement = $pdo->prepare($query);
		$statement->execute([':nom' => $nom, ':email' => $mail, ':mp' => $mp, ':role' => $role, ':idutilisateur' => $id]);
		// on redirige l'admin vers la page admin
		$_SESSION['flash'] = "L'utilisateur " . $nom . " a bien été modifié";
		header("Location: ../admin.php");
		exit();

	} else { // sinon on modifie l'utilisateur dans la base de données
		$query = "UPDATE utilisateur SET nom = :nom, email = :email, mp = :mp WHERE idutilisateur = :idutilisateur";
		$statement = $pdo->prepare($query);
		$statement->execute([':nom' => $nom, ':email' => $mail, ':mp' => $mp, ':idutilisateur' => $id]);
		// on reset la session pour mettre à jour les données de l'utilisateur
		session_reset();
		// on recupere les données de l'utilisateur mis a jour
		$query = "SELECT * FROM utilisateur WHERE idutilisateur = :idutilisateur";
		$statement = $pdo->prepare($query);
		$statement->execute([':idutilisateur' => $id]);
		$user = $statement->fetch(PDO::FETCH_OBJ);
		// on met a jour la session
		$_SESSION['utilisateur'] = $user;
		$_SESSION['flash'] = "Votre compte a bien été modifié";
		// on redirige l'utilisateur vers sa page de profil
		header("Location: ../profil.php?id=" . $_SESSION['utilisateur']->idutilisateur);
		exit();
	}
}
