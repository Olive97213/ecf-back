<?php

require_once "include/function.php";
require_once 'include/db.php';

logged_only();

// on recupere tous les utilisateurs
$query = "SELECT * FROM utilisateur";
$statement = $pdo->prepare($query);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_OBJ);


include_once "header.php"; ?>


<body>

	<div class="container-fluid">
		<?php if (isset($_SESSION['flash']) && is_array($_SESSION['flash'])) : ?>
			<?php foreach ($_SESSION['flash'] as $type => $message) : ?>
				<div class="m-3 p-3 alert alert-<?= $type; ?>">
					<?= $message; ?>
				</div>
			<?php endforeach; ?>
			<?php unset($_SESSION['flash']); ?>
		<?php endif; ?>
		<h1>Bienvenu <?= $_SESSION['utilisateur']->nom ?></h1>
		<p><?= $_SESSION['utilisateur']->email ?></p>
		<p>
			<a href="editionUser.php?id=<?= $_SESSION['utilisateur']->idutilisateur ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
			<a href="action/deleteUser.php?id=<?= $_SESSION['utilisateur']->idutilisateur ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer cet utilisateur ?!`)" class="btn btn-danger" data-toggle="modal"><i class="bi bi-trash3-fill"></i> Delete</a>
		</p>
	</div>


</body>

</html>