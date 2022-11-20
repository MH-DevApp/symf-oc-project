<?php

namespace App\DataFixtures\MockData;

use DateTimeImmutable;
use Exception;

class MockDataRating {
  public static function getDatasRating(): array {
    $datas = [];

    // 1 STAR
    $datas[0] = [
      "Ce jeu est vraiment pourri ! je suis vraiment déçu ! A éviter !",
      "Berk !",
      "A éviter !",
      "Fuyer !!!!",
      "Mensonge !",
      "L'histoire du jeu est vraiment pas intéressante ! Les développeurs nous ont bien eu !",
      "Que dire ? Ne jouez pas à ce jeu !",
      "Beurk...",
      "Les graphismes sont horribles !",
      "Impossible de jouer à ce jeu, coder avec les pieds...",
      "Le gameplay est vraiment nul !"
    ];

    // 2 STAR
    $datas[1] = [
      "Ce jeu ne mérite pas plus de 2 étoiles! Et encore, je suis gentil !",
      "Intéressant au début mais vite lassant..",
      "Passez votre chemin, vous trouverez mieux !",
      "Dire que ce jeu était prometteur !",
      "Quel gachi !",
      "Non !",
      "Bien qu'il donne envie dans la description, dans la réalité c'est autre chose",
      "Vu le prix, ils auraient pu faire beaucoup mieux !"
    ];

    // 3 STAR
    $datas[2] = [
      "Pas mal, mais pas assez",
      "Vite lassant, mais ça passe tout de même",
      "Ca manque de contenu..",
      "Du potentiel, à voir avec les mises à jour",
      "Des bugs par ci par là, ne mérite pas plus !",
      "Ca passe !",
      "Peu mieux faire encore !",
      "Très léger en contenu",
      "Le jeu est bien mais ça manque de gameplay",
      "Les graphismes sont à revoir, sinon le jeu est plutôt pas mal"
    ];

    // 4 STAR
    $datas[3] = [
      "Très bon jeu, il a du potentiel",
      "Vraiment pas mal, je le conseil tout de même",
      "J'aime beaucoup les graphismes, manque un peu de gameplay pour être parfait",
      "Super !",
      "Génial !",
      "Je recommande !",
      "Quelques bugs mineurs, rien de méchant, le jeu est vraiment top !",
      "Le jeu est super !",
      "Très bien fait !"
    ];

    // 5 STAR
    $datas[4] = [
      "Parfait !",
      "Allez y les yeux fermé !",
      "Il est trop trop génial ce jeu !!!",
      "Mais bordel, ce jeu ! Un délice !",
      "J'adorrreeee trop !!!",
      "Il est vraiment parfait, rien à dire !",
      "Les développeurs ont trouvé l'idée du siècle ! Bravo à eux !",
      "Vraiment parfait !",
      "Top top top top top !",
      "Je pense que c'est le jeu que je préfère le plus !!!"
    ];

    return $datas;
  }
}