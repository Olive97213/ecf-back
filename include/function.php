<?php

function logged_only()
{
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (!isset($_SESSION['utilisateur']) && !isset($_SESSION['admin'])) {
		$_SESSION['flash'] = "Vous n'avez pas le droit d'accéder à cette page";
		header('Location: ../connexion.php');
		exit();
	}
	

	if (!isset($_SESSION['utilisateur']) && !isset($_SESSION['admin'])) {
		// Si l'utilisateur est connecté en tant que user, vérifier s'il tente d'accéder à un profil différent
		if ($_SESSION['utilisateur']->idutilisateur != $_GET['id']) {
			$_SESSION['flash'] = "Vous n'avez pas le droit d'accéder à cette page";
			header('Location: profil.php?id=' . $_SESSION['utilisateur']->idutilisateur);
			exit();
		}
	}

	
}
