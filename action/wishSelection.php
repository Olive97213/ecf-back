

<?php



$user = $_SESSION['utilisateur']->idutilisateur;


// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['article']);
    $description = htmlspecialchars($_POST['description']);
    $idListeDeSouhait = $_POST['idlisteDeSouhait'];

    // Ajouter l'article à la table 'article'
    $query = "INSERT INTO article (nom, description) VALUES (:nom, :description)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nom', $nom);
    $statement->bindValue(':description', $description);
    $statement->execute();

    // Récupérer l'ID de l'article nouvellement ajouté
    $idArticle = $pdo->lastInsertId();

    // Ajouter une entrée dans la table 'listedesouhait_has_article' pour lier l'article à la liste de souhait
    $query2 = "INSERT INTO listedesouhait_has_article (listedesouhait_idlisteDeSouhait, article_idArticle) VALUES (:idListeDeSouhait, :idArticle)";
    $statement2 = $pdo->prepare($query2);
    $statement2->bindValue(':idListeDeSouhait', $idListeDeSouhait);
    $statement2->bindValue(':idArticle', $idArticle);
    $statement2->execute();

    // Afficher un message de succès
    echo "L'article a été ajouté avec succès à la liste de souhaits.";
}

$query = "SELECT idlisteDeSouhait, nom FROM listeDeSouhait WHERE utilisateur_idutilisateur = :idutilisateur";
$statement = $pdo->prepare($query);
$statement->bindParam(':idutilisateur', $user);
$statement->execute();
$listesDeSouhait = $statement->fetchAll(PDO::FETCH_ASSOC);

// Créer une liste déroulante (select) avec les résultats
echo "<form method='POST' action=''>";
echo "<select id='idlisteDeSouhait' name='idlisteDeSouhait' onchange='this.form.submit()'>";

// Option titre ou option vide avec libellé spécifique
echo "<option value='' disabled selected>Choisissez une liste de souhait</option>";

// Parcourir les résultats et afficher les options de la liste déroulante
foreach ($listesDeSouhait as $listeDeSouhait) {
    echo "<option value='" . $listeDeSouhait['idlisteDeSouhait'] . "'>" . $listeDeSouhait['nom'] . "</option>";
}

echo "</select>";
echo "</form>";

// Vérifier si une liste de souhaits a été sélectionnée
if (isset($_POST['idlisteDeSouhait']) && !empty($_POST['idlisteDeSouhait'])) {
    // Afficher le formulaire d'ajout d'article
    echo "<form method='POST' action=''>";
    echo "<input type='hidden' name='idlisteDeSouhait' value='" . $_POST['idlisteDeSouhait'] . "'>";
    echo "<input type='text' name='article' placeholder='Nom de l article' required><br>";
    echo "<textarea name='description' placeholder='Description de l article' required></textarea><br>";
    echo "<input type='submit' name='submit' value='Ajouter'>";
    echo "</form>";
}
















