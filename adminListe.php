<?php
require_once "include/function.php";
require_once 'include/db.php';

logged_only();

// Récupérer toutes les listes de souhaits avec le nom de l'utilisateur créateur
$query = "SELECT l.*, u.nom AS createur, u.avatar FROM listeDeSouhait l JOIN utilisateur u ON l.utilisateur_idutilisateur = u.idutilisateur";
$statement = $pdo->prepare($query);
$statement->execute();
$listesDeSouhait = $statement->fetchAll(PDO::FETCH_OBJ);

include_once "header.php";
?>
<link rel="stylesheet" href="link/adminListe.css">


<button><a href="admin.php">Retour Admin</a></button>

	<h2>Gestion liste de souhait</h2>


<!-- Affichage des listes de souhaits -->
<div class="container">

  <?php foreach ($listesDeSouhait as $listeDeSouhait) : ?>
    <div class="liste-de-souhait">
      <?php if (!empty($listeDeSouhait->avatar)) : ?>
          <img src="<?php echo $listeDeSouhait->avatar; ?>" alt="Avatar de <?php echo $listeDeSouhait->createur; ?>">
        <?php endif; ?>
      <div class="contenu">
        <h3><?php echo $listeDeSouhait->nom; ?></h3>
        <p><?php echo $listeDeSouhait->description; ?></p>

        <!-- Récupérer les articles liés à la liste de souhait -->
        <?php
        $queryArticles = "SELECT a.* FROM article a JOIN listedesouhait_has_article la ON a.idArticle = la.article_idArticle WHERE la.listedesouhait_idlisteDeSouhait = :idListeDeSouhait";
        $statementArticles = $pdo->prepare($queryArticles);
        $statementArticles->bindValue(':idListeDeSouhait', $listeDeSouhait->idlisteDeSouhait);
        $statementArticles->execute();
        $articles = $statementArticles->fetchAll(PDO::FETCH_OBJ);

        if (!empty($articles)) {
          echo "<h4>Articles associés :</h4>";
          echo "<ul>";
          foreach ($articles as $article) {
            echo "<li>{$article->nom}</li>";
          }
          echo "</ul>";
        }
        ?>

        <p>Créateur : <?php echo $listeDeSouhait->createur; ?></p>
        <p>Date de publication : <?php echo $listeDeSouhait->createdAt; ?></p>
        <p>
					<button><a href="editionListeAdmin.php?id=<?= $listeDeSouhait->idlisteDeSouhait ?>">Edit</a></button>
					<button><a href="action/deleteListeAdmin.php?id=<?= $listeDeSouhait->idlisteDeSouhait ?>" onclick="return window.confirm(`Êtes-vous sûr de vouloir supprimer cette liste de souhaits ?!`)" >Delete</a></button>
				</p>

      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php include_once "footer.php"; ?>
