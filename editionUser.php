<?php
require_once 'include/db.php';
require_once 'include/function.php';

logged_only();


$id = $_GET['id'];

$query = "SELECT * FROM utilisateur WHERE idutilisateur = :idutilisateur";
$statement = $pdo->prepare($query);
$statement->execute([':idutilisateur' => $id]);
$user = $statement->fetch(PDO::FETCH_OBJ);
include_once "header.php";
?>

<title>Edit | User</title>
</head>

<body>
	
	<div class="container-fluid">
		<form method="post" action="action/editUser.php?id=<?= $user->idutilisateur ?>">
			<div class="m-3">
				<label for="nom">Votre Nom</label>
				<input type="text" name="nom" value="<?= $user->nom ?>">
			</div>

			<div class="m-3"><label for="email">Votre email</label>
				<input type="text" name="email" value="<?= $user->email ?>">
			</div>

			<div class="m-3">
				<label for="avarar">Votre avatar</label>
				<input type="url" name="avatar" value="<?= $user->avatar ?>">
			</div>

			<div class="m-3"><label for="mp">Votre mot de passe</label>
				<input type="password" name="mp" value="<?= $user->mp ?>">
			</div>
			<?php if (isset($_SESSION['admin'])) : ?>
				<div class="m-3"><label for="role">Votre role</label>
					<input type="number" name="role" value="<?= $user->role ?>">
				</div>
			<?php endif; ?>
			<input type="submit" name="edit" value="éditer">
		</form>
	</div>

</body>

</html>