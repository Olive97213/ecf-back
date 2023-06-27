<?php

require_once '../include/db.php';
session_start();

if (isset($_POST['submit'])) {
	// on verifie que les champs ne sont pas vides
	if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['mp'])) {
		// on recupere les données du formulaire
		$nom = htmlspecialchars($_POST['nom']);
		$mail = htmlspecialchars($_POST['email']);
		$mp = htmlspecialchars($_POST['mp']);
		// on verifie que l'utilisateur n'existe pas dans la base de données
		$query = "SELECT * FROM utilisateur WHERE email = :email";
		$statement = $pdo->prepare($query);
		$statement->bindValue(':email', $mail);
		$statement->execute();
		$user = $statement->fetch(PDO::FETCH_OBJ);
		// si l'utilisateur existe on affiche un message d'erreur
		if ($user) {

			session_start();
			$_SESSION['flash']['danger'] = "Cette adresse mail est déjà utilisée";
			header('Location: ../inscription.php');
			exit();

		}else { // sinon on l'ajoute dans la base de données

			$query = "INSERT INTO utilisateur (nom, email, mp, role) VALUES (:nom, :email, :mp, :role)";
			$statement = $pdo->prepare($query);
			$statement->bindValue(':nom', $nom);
			$statement->bindValue(':email', $mail);
			$statement->bindValue(':mp', $mp);
			$statement->bindValue(':role', 0);
			$statement->execute();
			// on affiche un message de succes
			if(!isset($_SESSION['admin']))
			{
				session_start();
				$_SESSION['flash']['success'] = "Votre compte a bien été créé !";
				header('Location: ../connexion.php');
				exit();
			}else{
				
				$_SESSION['flash']['success'] = "L'utilisateur a bien été ajouté !";
				header('Location: ../admin.php');
				exit();
			}
			
		}
		
	}
}
