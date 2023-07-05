<?php
require_once "include/function.php";
require_once 'include/db.php';

logged_only();

// Récupérer l'ID de l'utilisateur connecté
$utilisateur_id = $_SESSION['utilisateur']->idutilisateur;

// Récupérer toutes les listes de souhaits de l'utilisateur connecté
$query = "SELECT * FROM listeDeSouhait WHERE utilisateur_idutilisateur = :utilisateur_id";
$statement = $pdo->prepare($query);
$statement->bindParam(':utilisateur_id', $utilisateur_id);
$statement->execute();
$listesDeSouhait = $statement->fetchAll(PDO::FETCH_OBJ);

// Récupérer tous les articles associés aux listes de souhaits
foreach ($listesDeSouhait as $liste) {
	$query = "SELECT article.* FROM article 
              INNER JOIN listedesouhait_has_article ON article.idarticle = listedesouhait_has_article.article_idarticle
              WHERE listedesouhait_has_article.listeDeSouhait_idlisteDeSouhait = :liste_id";
	$statement = $pdo->prepare($query);
	$statement->bindParam(':liste_id', $liste->idlisteDeSouhait);
	$statement->execute();
	$liste->articles = $statement->fetchAll(PDO::FETCH_OBJ);
}

include_once "header.php";
?>
<link rel="stylesheet" href="link/profil.css">

<body>
	<h1>Bienvenue <?= $_SESSION['utilisateur']->nom ?></h1>
	<div class="container">
		<?php if (isset($_SESSION['flash']) && is_array($_SESSION['flash'])) : ?>
			<?php foreach ($_SESSION['flash'] as $type => $message) : ?>
				<div class="m-3 p-3 alert alert-<?= $type; ?>">
					<?= $message; ?>
				</div>
			<?php endforeach; ?>
			<?php unset($_SESSION['flash']); ?>
		<?php endif; ?>

		<div class="card">

			<div class="img">
				<?php if (!empty($_SESSION['utilisateur']->avatar)) : ?>
					<img src="<?= $_SESSION['utilisateur']->avatar ?>" alt="Avatar de <?= $_SESSION['utilisateur']->nom ?>">
				<?php endif; ?>
			</div>
			<div class="contenu">
				<p><?= $_SESSION['utilisateur']->email ?></p>

				<p>
					<button><a href="editionUser.php?id=<?= $_SESSION['utilisateur']->idutilisateur ?>"> Edit</a></button>
					<button><a href="action/deleteUser.php?id=<?= $_SESSION['utilisateur']->idutilisateur ?>" onclick="return window.confirm(`Êtes-vous sûr de vouloir supprimer cet utilisateur ?!`)">Delete</a></button>
				</p>
			</div>
		</div>
	</div>

	<!-- Afficher les listes de souhaits -->
<h2>Mes listes de souhaits</h2>
<div class="container">
	<?php foreach ($listesDeSouhait as $liste) : ?>
		<div class="card-liste">
			<div class="contenu-liste">
				<h4><?= $liste->nom ?></h4>
				<p><?= $liste->description ?></p>
				
				<!-- Afficher les articles de la liste de souhaits -->
				<?php foreach ($liste->articles as $article) : ?>
					<h5><?= $article->nom ?></h5>
					<!-- <p><?= $article->description ?></p> -->
				<?php endforeach; ?>
				
				<p>Créée le <?= $liste->createdAt ?></p>
				<p>
					<button><a href="editionListe.php?id=<?= $liste->idlisteDeSouhait ?>">Edit</a></button>
					<button><a href="action/deleteliste.php?id=<?= $liste->idlisteDeSouhait ?>" onclick="return window.confirm(`Êtes-vous sûr de vouloir supprimer cette liste de souhaits ?!`)" >Delete</a></button>
				</p>
			</div>
		</div>
	<?php endforeach; ?>
</div>
