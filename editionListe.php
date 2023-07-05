<?php
require_once 'include/db.php';
require_once 'include/function.php';

logged_only();

$id = $_SESSION['utilisateur']->idutilisateur;

// Récupérer les données de la liste de souhaits
$query = "SELECT * FROM listeDeSouhait WHERE utilisateur_idutilisateur = :idutilisateur";
$statement = $pdo->prepare($query);
$statement->execute([':idutilisateur' => $id]);
$liste = $statement->fetch(PDO::FETCH_OBJ);

// Récupérer les articles de la liste de souhaits en effectuant une jointure avec la table listedesouhait_has_article
$query = "SELECT a.* FROM article AS a
          JOIN listedesouhait_has_article AS lha ON lha.article_idarticle = a.idarticle
          WHERE lha.listeDeSouhait_idlisteDeSouhait = :idlisteDeSouhait";
$statement = $pdo->prepare($query);
$statement->execute([':idlisteDeSouhait' => $liste->idlisteDeSouhait]);
$articles = $statement->fetchAll(PDO::FETCH_OBJ);

include_once "header.php";
?>

<title>Edit | Liste</title>
</head>

<body>
	
	<div class="container-fluid">
		<form method="post" action="action/editConsultListe.php">
			
			<!-- Modification de la liste de souhaits -->
			<div class="m-3">
				<label for="nomListe">Nom de la liste</label>
				<input type="text" name="nomListe" value="<?= $liste->nom ?>">
			</div>

			<div class="m-3">
				<label for="descriptionListe">Description de la liste</label>
				<textarea name="descriptionListe"><?= $liste->description ?></textarea>
			</div>

			<!-- Boucle pour afficher les articles -->
			<?php foreach ($articles as $article) : ?>
				<div class="m-3">
					<label for="nomArticle">Nom de l'article</label>
					<input type="text" name="articles[<?= $article->idarticle ?>][nom]" value="<?= $article->nom ?>">
				</div>

				<div class="m-3">
					<label for="descriptionArticle">Description de l'article</label>
					<textarea name="articles[<?= $article->idarticle ?>][description]"><?= $article->description ?></textarea>
				</div>
			<?php endforeach; ?>

			<input type="submit" name="edit" value="éditer">
		</form>
	</div>

</body>

</html>
