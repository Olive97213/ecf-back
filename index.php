<?php
require_once 'vendor/autoload.php';
require_once 'include/db.php';

use Faker\Factory;

$faker = Factory::create();

for ($i = 0; $i < 10; $i++) {

    $query = "INSERT INTO user (nom, mail, mdp, role, isActive, avatar) VALUES (:nom, :mail, :mdp, :role, :isActive, :avatar)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nom', $faker->name);
    $statement->bindValue(':mail', $faker->email);
    $statement->bindValue(':mdp', $faker->password);
    $statement->bindValue(':role', $faker->randomElement([0, 1])); // Valeur aléatoire entre 0 et 1 pour "role"
    $statement->bindValue(':isActive', $faker->randomElement([0, 1])); // Valeur aléatoire entre 0 et 1 pour "isActive"
    $statement->bindValue(':avatar', $faker->image('C:\Users\Administrateur\Desktop\public\images\avatars', 200, 200, 'people', false)); // Génère une URL d'image aléatoire
    $statement->execute();

    $query = "INSERT INTO article (nom, description) VALUES (:nom, :description)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nom', $faker->word);
    $statement->bindValue(':description', $faker->sentence);

    $statement->execute();
}
