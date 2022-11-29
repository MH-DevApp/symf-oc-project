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

    // Sekiro™: Shadows Die Twice
    $datas[] = [
      "name" => "Sekiro™: Shadows Die Twice",
      "description" => "
        L'édition Game of the Year ajoute le contenu bonus suivant :
          - Reflet et Défi de force : nouveaux modes de défi de boss
          - Fragments : laissez des messages et des enregistrements de vos actions que les autres joueurs peuvent voir et noter
          - 3 skins cosmétiques à débloquer

        Jeu de l'année - The Game Awards 2019
        Meilleur jeu d'action 2019 - IGN
        Plus de 50 récompenses et nominations

        Suivez votre chemin vers la vengeance dans cette nouvelle aventure primée développée par FromSoftware, les créateurs de Bloodborne et de Dark Souls.

        Dans Sekiro™: Shadows Die Twice, vous incarnez le 'loup à un bras', un guerrier en disgrâce défiguré qui a frôle la mort. Assigné à la protection d'un jeune seigneur, descendant d'une lignée ancienne, vous devenez la cible d'ennemis plus vicieux les uns que les autres, dont le dangereux clan Ashina. Lorsque le jeune seigneur est capturé, rien ne peut vous arrêter dans votre quête pour retrouver l'honneur, même pas la mort elle-même.

        Explorez le Japon Sengoku de la fin des années 1500 et affrontez des ennemis démesurés dans un monde torturé. Déchaînez un arsenal d'outils prothétiques et de capacités de ninja, en mêlant discrétion, transversalité et verticalité, à des duels sans pitié.

        Vengez-vous. Recouvrez votre honneur. Tuez avec ingéniosité.
      ",
      "createdAt" => new DateTimeImmutable(sprintf("-%d days", rand(1, 365))),
      "nbPictures" => 5,
      "platforms" => ["playstation", "xbox", "pc"]
    ];

    // F1® Manager 2022
    $datas[] = [
      "name" => "F1® Manager 2022",
      "description" => "
        Marquez l'histoire de la F1® avec le jeu officiel F1® Manager 2022. Devenez manager de votre constructeur favori et faites vos sélections dans la liste des pilotes et du personnel de 2022. Grâce à la licence officielle F1® et à une présentation proche du réel, F1® Manager 2022 est plus qu'un jeu, c'est une aventure.

        Carrière – Devenez le meilleur
        Écrivez un nouveau chapitre et ouvrez une nouvelle ère pour la F1®. Choisissez votre équipe de F1® et guidez-la vers la victoire à travers les courses officielles de la saison 2022. Commencez à l'arrière de la grille ou prenez place en pole position : dans F1® Manager, c'est à vous de faire tous les choix. Votre mission sera d'impressionner le comité directeur an atteignant vos objectifs chaque saison ainsi que ceux à long terme, et d'assurer le succès de votre équipe pour les années à venir.

        Le QG – Construisez votre équipe
        L'équipe du constructeur constitue le cœur des opérations. Entre chaque course, contrôlez tous les détails de votre équipe depuis le QG. Suivez les performances de vos pilotes et de votre équipe, équilibrez votre budget et allez chercher les meilleurs éléments des équipes rivales pour prendre l'avantage lors des courses suivantes.

        L'usine – Perfectionnez votre voiture
        Découvrez les nouveaux concepts de véhicules de 2022 et approchez-vous de vos adversaires comme jamais auparavant. Attribuez de nouvelles pièces à vos voitures pour vous préparer à la course à venir. Construisez votre machine pour prendre l'avantage dans les prochains circuits. Allez-vous développer un système équilibré, tenter de compenser vos faiblesses, ou vous concentrer sur un aspect spécifique ?

        La course – Élaborez et appliquez votre stratégie
        De la ligne de départ au drapeau de l'arrivée, c'est vous qui tenez les commandes. Contrôlez toutes les décisions, depuis la stratégie des stands jusqu'au choix des pneus en passant par les pilotes. Planifiez votre approche, mais préparez-vous à devoir vous adapter aux évènements dynamiques de chaque course, comme la météo ou les conditions changeantes du circuit. Plongez-vous dans une simulation hyperréaliste d'une course de F1® officielle, avec des images proches du réel.
      ",
      "createdAt" => new DateTimeImmutable(sprintf("-%d days", rand(1, 365))),
      "nbPictures" => 9,
      "platforms" => ["playstation", "xbox", "pc"]
    ];

    // Sid Meier’s Civilization® VI
    $datas[] = [
      "name" => "Sid Meier’s Civilization® VI",
      "description" => "
        Civilization VI propose de nouvelles façons d'interagir avec votre monde : les villes s'étendent désormais réellement sur la carte, la recherche active dans les domaines de la technologie et de la culture débloquent de nouvelles possibilités, et les chefs rivaux poursuivent leurs propres objectifs en fonction de leurs caractéristiques historiques, alors que vous vous engagez dans l'une de cinq voies vers la victoire dans le jeu.
        
        Visualisez les splendeurs de votre empire s'étendre à travers la carte comme jamais auparavant. Chaque quartier, chaque merveille et chaque amélioration est bâtie sur sa propre case, vous permettant de personnaliser votre ville autant que vous le souhaiterez.
        De la plateforme commerciale au spacioport, chaque quartier fournit ses propres bonus uniques. Sélectionnez quels quartiers construire pour répondre à vos besoins !
        Bâtissez mieux que vos concurrents, positionnez-vous de façon stratégique par rapport à vos alliés, et devenez la meilleure civilisation sur Terre.
        
        Boostez les progrès de votre civilisation à travers l'histoire pour être le premier à débloquer des bonus puissants ! Pour avancer plus vite, utilisez vos unités pour lancer une exploration active, pour développer votre environnement et pour découvrir de nouvelles sociétés.
        La recherche ne se limite pas aux sciences. Explorez l'arbre des dogmes pour débloquer des nouvelles doctrines politiques et culturelles puissantes.
        Développez une civilisation qui s'aligne avec votre mode de jeu, ou changez-la à chaque partie !
        
        Vos relations diplomatiques évoluent au fur et à mesure que vous progressez, depuis les premières interactions primitives où les conflits sont un fait inévitable, jusqu'aux alliances et négociations aux stades plus avancés du jeu.
        Influencez les cités-états locales pour bénéficier de leur allégeance diplomatique et remporter des bonus de cité-état qui pourraient changer le cours déroulement du jeu.
        Recrutez des espions pour obtenir des informations cruciales sur les civilisations rivales, voler des ressources précieuses et même faire chuter des gouvernements.
      ",
      "createdAt" => new DateTimeImmutable(sprintf("-%d days", rand(1, 365))),
      "nbPictures" => 8,
      "platforms" => ["playstation", "xbox", "pc", "nintendo"]
    ];

    // Rust
    $datas[] = [
      "name" => "Rust",
      "description" => "
        Dans Rust, le seul but est de survivre.

        Pour cela, vous devrez surmonter des difficultés telles que la faim, la soif, et le froid. Allumez un feu. Construisez un abri. Tuez des animaux pour leur viande. Protégez-vous des autres joueurs, et tuez-les pour leur viande. Créez des alliances avec d'autres joueurs et développez une ville.

        Faites ce qu'il faut pour survivre.
      ",
      "createdAt" => new DateTimeImmutable(sprintf("-%d days", rand(1, 365))),
      "nbPictures" => 14,
      "platforms" => ["pc"]
    ];

    // PUBG: BATTLEGROUNDS
    $datas[] = [
      "name" => "PUBG: BATTLEGROUNDS",
      "description" => "
        ATTERRISSEZ, PILLEZ, SURVIVEZ !
        Jouez gratuitement à PUBG: BATTLEGROUNDS.
        
        Atterrissez à des emplacements stratégiques, pillez des armes et du ravitaillement, puis survivez pour devenir la dernière équipe en lice lors de combats farouches sur des champs de bataille tout aussi divers que variés.
        Formez une escouade et ruez-vous sur les champs de bataille pour vivre l’authentique expérience originale \"sang pour sang\" Battle Royale que seule PUBG: BATTLEGROUNDS peut vous offrir.
      ",
      "createdAt" => new DateTimeImmutable(sprintf("-%d days", rand(1, 365))),
      "nbPictures" => 13,
      "platforms" => ["playstation", "xbox", "pc"]
    ];

    // The Elder Scrolls® Online
    $datas[] = [
      "name" => "The Elder Scrolls® Online",
      "description" => "
        Vivez une histoire en expansion constante dans tout Tamriel avec The Elder Scrolls Online, un RPG en ligne primé. Explorez un monde riche et vivant entre amis ou partez pour une aventure solo.
        
        JOUEZ COMME VOUS VOULEZ
        Combat, artisanat, vol, exploration… combinez différents types d’équipements et de compétences pour créer votre propre style de jeu. Le choix vous appartient, dans un monde Elder Scrolls persistant et en expansion constante.

        RACONTEZ VOTRE HISTOIRE
        Découvrez les secrets de Tamriel tandis que vous partez en quête de votre âme perdue et sauvez le monde face à Oblivion. Vivez toutes les histoires dans toutes les régions du monde, dans l’ordre que vous voudrez… seul ou en groupe.

        UN JDR MULTIJOUEUR
        Accomplissez les quêtes entre amis, rejoignez d’autres aventuriers pour explorer de dangereux donjons remplis de monstres, ou participez à des batailles JcJ épiques entre plusieurs centaines de joueurs.
      ",
      "createdAt" => new DateTimeImmutable(sprintf("-%d days", rand(1, 365))),
      "nbPictures" => 7,
      "platforms" => ["pc"]
    ];

    // Grand Theft Auto V
    $datas[] = [
      "name" => "Grand Theft Auto V",
      "description" => "
        Lorsqu'un jeune arnaqueur, un braqueur de banque à la retraite et un terrifiant psychopathe se retrouvent piégés par de grands criminels, le gouvernement américain et l'industrie du divertissement, ils décident de se lancer dans une série de braquages pour survivre dans une ville sans pitié, où ils ne peuvent se fier à personne, même entre eux.

        Grand Theft Auto V sur PC offre aux joueurs la possibilité d'explorer le monde de Los Santos et Blaine County en haute résolution (jusqu'à 4K) et à 60 images par seconde.

        Le jeu propose également tout un panel d'options de personnalisation spécifiques au PC, incluant 25 paramètres distincts de qualité de texture, d'ombres, de pavage, d'anticrénelage et d'autres, ainsi que la possibilité de personnaliser intégralement les commandes de la souris et du clavier. Les options permettent également de contrôler la densité du trafic, pour les piétons et les automobilistes, d'utiliser jusqu'à trois écrans, de jouer en 3D, et incluent un système plug-and-play pour vos manettes.

        Grand Theft Auto V sur PC contient également Grand Theft Auto Online, avec des parties pouvant accueillir jusqu'à 30 joueurs et deux spectateurs. Toutes les améliorations existantes de gameplay et le contenu créé par Rockstar depuis le lancement de Grand Theft Auto Online seront également disponibles, y compris les Braquages et les modes Rivalité.

        Les versions PC de Grand Theft Auto V et Grand Theft Auto Online incluent le mode à la première personne, qui permet aux joueurs d'explorer l'extraordinaire monde de Los Santos d'un tout nouveau point de vue.

        Également dans les nouveautés : l'Éditeur Rockstar, un outil créatif très complet pour enregistrer, modifier et partager vos vidéos de gameplay de Grand Theft Auto V et Grand Theft Auto Online. Le mode Réalisateur permet aux joueurs de créer leur propre mise en scène en se servant des protagonistes du mode Histoire, de piétons ou même d'animaux. Vous pouvez manipuler la caméra comme bon vous semble et ajouter des effets spéciaux incluant des scènes en accéléré ou au ralenti et différents filtres de caméra. Les joueurs peuvent ajouter des musiques en se servant des chansons diffusées sur les stations de radio de GTAV et contrôler l'intensité de la bande-originale du jeu. Les vidéos terminées peuvent être publiées directement depuis l'Éditeur Rockstar sur YouTube ou sur le Rockstar Games Social Club.

        Les artistes The Alchemist et Oh No sont de retour en tant qu'hôtes d'une nouvelle station de radio, The Lab FM. Cette station propose de nouvelles chansons exclusives produites par le duo, basées sur et inspirées par la bande-originale du jeu. Des artistes comme Earl Sweatshirt, Freddie Gibbs, Little Dragon, Killer Mike, Sam Herring de Future Islands et plus encore ont participé à l'élaboration de cette bande-son. Les joueurs peuvent aussi découvrir Los Santos et Blaine County tout en écoutant leur propre musique via Radio Perso, une station de radio qui permet d'héberger des musiques choisies par le joueur.
      ",
      "createdAt" => new DateTimeImmutable(sprintf("-%d days", rand(1, 365))),
      "nbPictures" => 7,
      "platforms" => ["playstation", "xbox", "pc"]
    ];

    // Black Desert
    $datas[] = [
      "name" => "Black Desert",
      "description" => "
        Un monde hyper réaliste : LE MEILLEUR MMORPG DU MONDE
        Black Desert est un jeu qui teste les limites du genre MMORPG en implémentant des graphismes et une bande son remastérisés. Profitez de contenus de jeu variés comme les guerres de conquête/géoconflits ou des contenus de profession tels que l'exploration, le commerce, la pêche, le dressage, l'alchimie, la cuisine, la récolte, la chasse et bien plus ! Faites l'expérience de tout cela dans un monde ouvert, vaste et somptueux.
        Voici Black Desert, le jeu de rôle MMO nouvelle génération.
        
        Commencez votre aventure, réalisez vos rêves !
        
        GRAPHISMES
        La version remastérisée garantit une qualité graphique optimale
        Un MMORPG à monde ouvert en constante expansion, créé par le moteur de jeu exclusif de Pearl Abyss. Black Desert est un jeu aux décors splendides avec des environnements hyper réalistes et des détails sophistiqués. Immergez-vous dans un univers né d'une technologie graphique de pointe et préparez-vous pour des aventures inoubliables.
        
        MONDE OUVERT
        Des contenus de jeu hors-combat variés
        Vous n'êtes pas du genre bagarreur ? De nombreuses autres activités n'attendent que vous ! Culture, commerce, dressage de cheval, pêche, navigation, transformation, cuisine... Amusez-vous à découvrir toutes ces professions !
        
        CONNAISSANCE
        Contenu de jeu basé sur la connaissance
        La connaissance, c'est le pouvoir ! Plus vous en apprendrez, mieux ce sera. L'acquisition de connaissances par le biais de combats, d'explorations et de conversations avec les PNJ vous confèrera de nombreux avantages sur le champ de bataille.
        
        COMBAT
        Une explosion d'action
        Faites l'expérience de batailles dynamiques aux graphismes plus vrais que nature. Profitez d'un gameplay palpitant et ultra réaliste grâce à des mécaniques de combats basées sur des enchaînements de compétences spectaculaires.
        
        GÉOCONFLIT & GUERRE DE CONQUÊTE
        Contenu JcJ à grande échelle
        Black Desert vous propose des contenus JcJ auxquels vous pouvez participer avec les membres de votre guilde tels que la guerre de conquête et le géoconflit. Remportez la victoire en unissant vos forces !
        
        PERSONNALISATION
        Découvrez votre véritable nature
        La personnalisation vous permet de créer votre propre look. Créez un personnage unique en vous amusant à ajuster de nombreux paramètres d'apparence comme la taille, la forme du visage, la couleur des yeux, les cheveux, la couleur de la peau et bien plus encore !
      ",
      "createdAt" => new DateTimeImmutable(sprintf("-%d days", rand(1, 365))),
      "nbPictures" => 10,
      "platforms" => ["pc"]
    ];

    return $datas;
  }
}