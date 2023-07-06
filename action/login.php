<?php

require_once '../include/db.php';

if (isset($_POST['submit'])) {
	// on verifie que les champs ne sont pas vides
	if (!empty($_POST['email']) && !empty($_POST['mp'])) {

		// on recupere les données du formulaire
		$mail = htmlspecialchars($_POST['email']);
		$mp = htmlspecialchars($_POST['mp']);
		// on verifie que l'utilisateur existe dans la base de données
		$query = "SELECT * FROM utilisateur WHERE email = :email AND mp = :mp";

		$statement = $pdo->prepare($query);
		$statement->bindValue(':email', $mail);
		$statement->bindValue(':mp', $mp);
		$statement->execute();

		$user = $statement->fetch(PDO::FETCH_OBJ);
		// si l'utilisateur existe on le connecte
		if ($user) {

			session_start();
			// si l'utilisateur est un admin on le connecte en tant qu'admin
			if ($user->role == 1) {

				$_SESSION['admin'] = $user;
				$_SESSION['flash'] = "Vous êtes connecté en tant qu'administrateur";
				header('Location: ../admin.php?id=' . $_SESSION['admin']->idutilisateur);

				exit();
			} else { // sinon on le connecte en tant qu'utilisateur

				$_SESSION['utilisateur'] = $user;
				$_SESSION['flash'] = "Vous êtes connecté";
				header('Location: ../profil.php?id=' . $_SESSION['utilisateur']->idutilisateur);
				exit();
			}
		} else { // sinon on affiche un message d'erreur

			session_start();
			$_SESSION['flash'] = "Identifiants ou mot de passe incorrects";
			header('Location: ../connexion.php');
			exit();
		}
	}
}
