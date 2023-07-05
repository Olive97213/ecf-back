<?php

require_once '../include/db.php';

session_start();

// On récupère l'id de la liste de souhaits à partir du formulaire
$idListe = $_POST['idListe'];

// On récupère les données du formulaire
if (isset($_POST['edit'])) {
	
	$nomListe = $_POST['nom'];
	$descriptionListe = $_POST['description'];

	// On met à jour le nom et la description de la liste de souhaits
	$query = "UPDATE listeDeSouhait SET nom = :nom, description = :description WHERE idlisteDeSouhait = :idliste";
	$statement = $pdo->prepare($query);
	$statement->execute([':nom' => $nomListe, ':description' => $descriptionListe, ':idliste' => $idListe]);

	// On met à jour les articles de la liste de souhaits
	$articles = $_POST['articles'];
	foreach ($articles as $idArticle => $article) {
		$nomArticle = $article['nom'];
		$descriptionArticle = $article['description'];

		$query = "UPDATE article SET nom = :nom, description = :description WHERE idarticle = :idarticle";
		$statement = $pdo->prepare($query);
		$statement->execute([':nom' => $nomArticle, ':description' => $descriptionArticle, ':idarticle' => $idArticle]);
	}

	// Redirection vers la page de la liste de souhaits
	header("Location: ../profil.php");
	exit();
}
