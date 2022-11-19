<?php

namespace App\DataFixtures\MockData;

use DateTimeImmutable;
use Exception;

class MockDataGame {

  /**
   * Get datas fixtures for game entity
   * @return array
   * @throws Exception
   */
  public static function getDatasGame(): array {
    $datas = [];

    // Marvel’s Spider-Man: Miles Morales
    $datas[] = [
      'name' => 'Marvel’s Spider-Man: Miles Morales',
      'description' => "
        Après les événements de Marvel’s Spider-Man Remastered, le jeune Miles Morales prend ses marques dans son nouveau foyer en marchant dans les pas de son mentor, Peter Parker, en tant que nouveau Spider-Man. Mais quand une lutte de pouvoir menace de détruire sa ville, le héros en devenir se rend compte qu'un grand pouvoir implique de grandes responsabilités. Pour sauver le New York de Marvel, Miles va devoir endosser la tenue de Spider-Man et s'en montrer digne.
        
        L'avènement de Miles Morales
        
        Miles Morales se découvre un pouvoir explosif qui le distingue de son mentor, Peter Parker. Maîtrisez la décharge bioélectrique et le camouflage optique de Miles, ainsi que ses incroyables capacités acrobatiques d'araignée, ses gadgets et ses compétences.
        
        Une lutte de pouvoir
        
        Une guerre fait rage dans le New York de Marvel entre une société d'énergie corrompue et une armée criminelle équipée de technologie de pointe. Son nouveau foyer pris au cœur de la bataille, Miles découvre ce qu'il en coûte de devenir un héros et va devoir faire des sacrifices pour le bien de tous.
        
        Un nouveau quartier animé
        
        Parcourez les rues enneigées et ey fourmillant de vie du nouveau quartier dans lequel Miles tente de s'intégrer. Alors que la frontière entre sa vie privée et sa vie de justicier s'estompe, Miles va découvrir qu'il n'est pas seul et qu’il peut enfin se sentir chez lui.
        
        Graphismes optimisés pour PC
        
        Profitez d'une gamme d'options de qualité graphique conçues pour s'adapter à chaque appareil, d'IPS débloquées et de prise en charge d'autres technologies dont le NVIDIA DLSS 2 et le NVIDIA DLSS 3 qui accélèrent les performances graphiques, le NVIDIA DLAA qui améliore la qualité d’image et le NVIDIA Reflex qui réduit les latences. Également compatible avec les technologies de mise à l’échelle AMD FSR 2.1, Intel XeSS et IGTI.
        
        Reflets et ombres en ray-tracing*
        
        Regardez la ville prendre vie grâce aux options de reflets et d'ombres en ray-tracing à couper le souffle, en choisissant parmi une gamme de modes de qualité.
        
        Compatibilité avec les écrans ultra-larges**
        
        Admirez toute la splendeur du New York de Marvel grâce à la prise en charge de diverses configurations d'écran, dont les résolutions 16:9, 16:10, 21:9, 32:9 et 48:9. Les configurations à trois écrans en résolution 48:9 sont compatibles avec NVIDIA Surround et AMD Eyefinity.
        
        Commandes et personnalisation
        
        Découvrez ce que ressent Spider-Man grâce au retour haptique et aux effets de gâchette dynamiques de la manette DualSense™ pour PlayStation en utilisant une connexion filaire USB. Profitez également d'une prise en charge intégrale de la souris et du clavier avec diverses options de commandes personnalisables.
        
        *PC compatible requis.
        **PC et écran compatibles requis.
      ",
      "createdAt" => new DateTimeImmutable(sprintf('-%d days', rand(1, 365))),
      "nbPictures" => 6,
      "platforms" => ["playstation", "pc"]
    ];

    // Call of Duty®: Modern Warfare® II
    $datas[] = [
      'name' => 'Call of Duty®: Modern Warfare® II',
      'description' => "
        Les détenteurs de l'édition Standard numérique de Modern Warfare® II peuvent passer à l'édition Coffres d'armes dans le cadre d'une offre à durée limitée.
        
        Bienvenue dans la nouvelle ère de Call of Duty®.
        
        Call of Duty®: Modern Warfare® II plonge les joueurs dans un conflit mondial sans précédent, avec le retour des Opérateurs emblématiques de la Task Force 141. Qu'il s'agisse d'opérations tactiques d'infiltration à petite échelle et à fort enjeu, ou de missions hautement confidentielles, les joueurs se déploieront aux côtés de leurs amis dans une expérience véritablement immersive.
        
        Infinity Ward apporte aux fans un gameplay de pointe, avec un tout nouveau maniement des armes, un système d'IA avancé, une nouvelle armurerie et d'autres innovations de gameplay et graphiques qui élèvent la franchise vers de nouveaux sommets.
        
        Le lancement de Modern Warfare® II sera lancé avec une campagne solo à travers le monde, des combats Multijoueurs immersifs et une expérience d’Opérations Spéciales en coopération axée sur la narration.
        
        Vous obtenez également accès à Call of Duty®: Warzone™ 2.0, la toute nouvelle expérience de Battle Royale.
      ",
      "createdAt" => new DateTimeImmutable(sprintf('-%d days', rand(1, 365))),
      "nbPictures" => 6,
      "platforms" => ["playstation", "xbox", "pc"]
    ];

    // Sea of Thieves
    $datas[] = [
      "name" => "Sea of Thieves",
      "description" => "
        Sea of Thieves vous propose une aventure de pirate ultime avec un gameplay directement issu de l'imaginaire de la piraterie : de la navigation, de l'exploration et des chasses aux trésors. Comme les rôles ne sont pas prédéfinis, vous pourrez contribuer à ce monde comme il vous plaira.
        Que vous voguiez en solitaire ou à plusieurs, vous ferez la rencontre d'autres équipages. Mais seront-ils amis ou ennemis ? Et ferez-vous preuve de bienveillance ou serez-vous impitoyable ?
        
        Un vaste monde ouvert
        Explorez un vaste monde ouvert plein d'îles inconnues, de navires engloutis et de mystérieux artéfacts. Prenez des quêtes pour retrouver des trésors perdus, traquez les capitaines squelettes maudits, ou collectez des marchandises précieuses pour les sociétés. Pêchez, chassez, ou choisissez parmi les centaines d'objectifs facultatifs et quêtes secondaires.
        
        Sea of Thieves :Vive la piraterie
        Commencez une fable du flibustier pour vivre les campagnes narratives uniques de Sea of Thieves, et joignez vos forces à celles du capitaine Jack Sparrow dans une toute nouvelle histoire originale où l'univers de Disney's Pirates of the Caribbean se mêle à celui de Sea of Thieves. Ces quêtes immersives et cinématiques vous fourniront environ 30 heures de pure aventure pirate.
        
        Devenez une légende
        Au cours de votre épopée pour devenir une légende pirate, vous pourrez amasser du butin, vous forger une réputation et définir votre propre style grâce à des récompenses gagnées à la sueur de votre front. Aventure, exploration ou conquête... quelle sera votre légende ?
        
        Un jeu en perpétuelle évolution
        Avec cinq extensions majeures et presque un an de mises à jour mensuelles, Sea of Thieves est un jeu qui continue à croître et à évoluer. N'oubliez pas de venir voir chaque mois le nouveau contenu ajouté !
      ",
      "createdAt" => new DateTimeImmutable(sprintf('-%d days', rand(1, 365))),
      "nbPictures" => 9,
      "platforms" => ["xbox", "pc"]
    ];

    // FIFA 23
    $datas[] = [
      "name" => "FIFA 23",
      "description" => "
      FIFA 23 est un jeu vidéo de simulation de football développé par EA Vancouver et édité par Electronic Arts. Il s'agit du 30e volet de la série FIFA. Il est sorti sur Microsoft Windows, Nintendo Switch, PlayStation 4, PlayStation 5, Xbox One, Xbox Series et Google Stadia le 30 septembre 2022.
      
      FIFA 23 est le dernier jeu vidéo estampillé « FIFA » développé par EA. En effet, n'ayant pas pu trouver un accord avec la FIFA, l'entreprise américaine ne pourra plus utiliser ce nom pour le nommage de ses jeux de simulation de football. Le prochain jeu, qui aurait du se nommer FIFA 24, aura pour nom Ea Sports Football Club 2024.
      
      Les versions du jeu PlayStation 5, Xbox Series, Google Stadia et Microsoft Windows utilise la technologie HyperMotion2. Elle permet de retranscrire les mouvements de 22 joueurs professionnels jouant à haute intensité. Cette nouvelle technologie augmente le réalisme du jeu et de ses animations.
      
      Pour ce nouvel opus, il y a la possibilité de jouer en cross plateforme. En effet, il y a un seul éco-système en fonction de la version choisie (huitième ou neuvième générations de console), notamment sur le mode de jeu Fifa Ultimate Team 23 ou il n'y a qu'un seul marché des transfert. Il n'y a plus de différence de matchmaking entre les consoles.
      
      Kylian Mbappé figure pour la 3e fois consécutive sur la jaquette du jeu, tandis que Kai Havertz en est l'ambassadeur. Pour la première fois dans une franchise FIFA, une joueuse est également présente sur la jaquette du jeu, il s'agit de Sam Kerr. De plus, plusieurs ligues féminines sont disponibles ainsi que la Coupe du monde féminine de football 2023.
      
      Dans la version française, Hervé Mathoux, présent depuis FIFA 07, cède sa place à deux nouveaux commentateurs : Omar da Fonseca et Benjamin Da Silva, duo iconique de la chaine BeIn Sport.
      
      En seulement trois jours, ce nouvel opus a été le jeu le plus téléchargé sur le PlayStation Store européen sur PS4 et PS5 pour le mois de septembre.
      ",
      "createdAt" => new DateTimeImmutable(sprintf("-%d days", rand(1, 365))),
      "nbPictures" => 8,
      "platforms" => ["playstation", "xbox", "pc", "nintendo"]
    ];

    // Football Manager 2023
    $datas[] = [
      "name" => "Football Manager 2023",
      "description" => "
        Rejoignez l'élite des entraîneurs en écrivant votre propre épopée, en gagnant l'amour des fans et en dominant la compétition dans Football Manager 2023.
        
        La gestion footballistique n'est pas qu'une question de choisir sa tactique ou monter son équipe. C'est aussi le frisson de relever des défis et d'innover.
        \t- Trouvez le club qui vous convient. Cochez les objectifs des dirigeants et des fans et battez les meilleurs dans votre épopée vers les plus beaux trophées du football.
        \t- Ne vous contentez pas de signer les superstars, créez-les. Faites passer un cap à votre recrutement grâce à l'aide de votre staff technique et accompagnez vos jeunes prodiges jusqu'en équipe première pour développer un effectif de classe mondiale.
        \t- Dictez le style de votre équipe. Créez une stratégie unique sur le tableau tactique, capable de vous offrir de belles victoires et des matchs inoubliables.
        
        Nouveautés cette saison
        MONTEZ DES EFFECTIFS PLUS ROBUSTES
        Renforcez votre présence sur le marché des transferts avec un recrutement et des réunions de recrutement retravaillés, des relations plus étroites avec les agents et de nouveaux outils de construction d'effectif. Avec une meilleure vue d'ensemble des joueurs sur vos tablettes, il n'a jamais été plus facile de relever les ambitions à long terme de votre club.
        
        SURPASSEZ LA CONCURRENCE
        Testez vos talents d'entraîneur contre les entraîneurs IA les plus réalistes de l'histoire de la série à ce jour. Une refonte de la prise de décisions des adversaires les a rendus plus avisés, tandis que de nouvelles instructions tactiques sans le ballon rendent le football défensif et de contre-attaque plus viable. Alors que chaque match sera plus disputé que jamais, vous remarquez des améliorations au moteur de match, y compris des changements à la façon dont les latéraux et doubles pivots fonctionnent ainsi qu'un éventail de nouvelles animations.
        
        METTEZ LES SUPPORTERS DANS VOTRE POCHE
        Devenez plus proche des fans que jamais auparavant avec le nouveau système Confiance des supporters. Répondez à leurs attentes sur la pelouse et en dehors pour vous assurer un avenir radieux sur le banc.
        
        GRANDES SOIRÉES EUROPÉENNES
        Profitez des meilleures sensations en participant à l'UEFA Champions League, l'UEFA Europa League et l'UEFA Europa Conference League, toutes entièrement sous licence. Des tirages de coupe retravaillés et des feuilles de match, tableaux d'affichage et représentations graphiques des buts aux couleurs officielles donnent vie aux compétitions de clubs UEFA.
        
        SAVOUREZ VOS SUCCÈS
        Revivez les moments marquants et succès de chaque carrière avec la toute nouvelle Chronologie dynamique d'entraîneur. Que vous ayez offert sa première titularisation à un jeune en équipe première ou gagné l'UEFA Champions League, il n'a jamais été plus facile de savourer et partager votre histoire Football Manager.
        
        D'innombrables fonctionnalités supplémentaires, petites et grandes, conçues pour améliorer votre expérience de jeu sont à découvrir dans chaque nouvelle carrière.
        
        *Les versions de l'accès anticipé du jeu peuvent débuter à différentes périodes sur différentes plateformes. \"
      ",
      "createdAt" => new DateTimeImmutable(sprintf('-%d days', rand(1, 365))),
      "nbPictures" => 6,
      "platforms" => ["playstation", "nintendo", "xbox", "pc"]
    ];

    return $datas;
  }
}