<?php

require_once 'include/db.php';
require_once 'include/function.php';

// on verifie que l'utilisateur est connecté
logged_only();

if ($_SESSION['admin']->role != 1) {
	header("Location: profil.php");
	exit();
}

// on recupere tous les utilisateurs
$query = "SELECT * FROM utilisateur";
$statement = $pdo->prepare($query);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_OBJ);

// Récupérer toutes les listes de souhaits avec le nom de l'utilisateur créateur
$query = "SELECT l.*, u.nom AS createur, u.avatar FROM listeDeSouhait l JOIN utilisateur u ON l.utilisateur_idutilisateur = u.idutilisateur";
$statement = $pdo->prepare($query);
$statement->execute();
$listesDeSouhait = $statement->fetchAll(PDO::FETCH_OBJ); ?>




<?php include_once "header.php"; ?>
<link rel="stylesheet" href="link/admin.css">



<h1>Bonjour administrateur: <?= $_SESSION['admin']->nom ?></h1>

<div class="container">


	<!-- Affichage des informations de l'admin -->
	<div class="admin">
		<?php if (!empty($_SESSION['admin']->avatar)) : ?>
			<img src="<?= $_SESSION['admin']->avatar ?>" alt="Avatar de <?= $_SESSION['admin']->nom ?>">
		<?php endif; ?>
		<div class="contenu">
			<h3><?= $_SESSION['admin']->nom ?></h3>
			<p><?= $_SESSION['admin']->email ?></p>
			<p>Rôle: Administrateur</p>

			<button class="inscription"><a href="inscription.php">Ajouter un utilisateur</a></button>
			<button class="inscription"><a href="adminListe.php">Gestion liste de souhait</a></button>
		</div>
	</div>


	<div class="titre-gestion">
		<h2>Gestion des utilisateurs</h2>
	</div>
	<!-- on affiche les messages flash -->
	<?php if (isset($_SESSION['flash']) && is_array($_SESSION['flash'])) : ?>
		<?php foreach ($_SESSION['flash'] as $type => $message) : ?>
			<div class="m-3 p-3 alert alert-<?= $type; ?>">
				<?= $message; ?>
			</div>
		<?php endforeach; ?>
		<?php unset($_SESSION['flash']); ?>
	<?php endif; ?>

	<!-- on affiche tous les utilisateurs -->
	<?php foreach ($users as $user) : ?>
		<div class="liste-user">
			<?php if (!empty($user->avatar)) : ?>
				<img src="<?php echo $user->avatar; ?>" alt="Avatar de <?php echo $user->avatar; ?>">
			<?php endif; ?>
			<div class="contenu">
				<h3><?php echo $user->nom; ?></h3>
				<p><?php echo $user->email; ?></p>
				<p>Role:<?php echo $user->role; ?></p>
				<button><a href="editionUser.php?id=<?= $user->idutilisateur ?>">Edit</a></button>
				<button><a href="action/deleteUser.php?id=<?= $user->idutilisateur ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer cet utilisateur ?!`)">Delete</a></button>


			</div>

		</div>
	<?php endforeach; ?>
</div>





			












			<?php include_once "footer.php"; ?>