

<?php



$query = "SELECT idlisteDeSouhait, nom From listeDeSouhait";

$statement = $pdo->prepare($query);
$statement->execute();
$listesDeSouhait = $statement->fetchAll(PDO::FETCH_ASSOC);

// Créer une liste déroulante (select) avec les résultats
echo "<select id='idlisteDeSouhait' nom='nom' onchange='updateElements(this.value)'>";

// Option titre ou option vide avec libellé spécifique
echo "<option value='' disabled selected>Choisissez une liste de souhait</option>";

// Parcourir les résultats et afficher les options de la liste déroulante
foreach ($listesDeSouhait as $listeDeSouhait) {
    echo "<option value='".$listeDeSouhait['idlisteDeSouhait']."'>".$listeDeSouhait['nom']."</option>";
}

echo "</select>";




