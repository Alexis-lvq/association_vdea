
--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `role`, `created_at`, `nom`, `prenom`) VALUES
(2, 'alexisleveque.dev@icloud.com', '$2y$10$McCpWaA2yrQLBs3e7HY0UeHGdxK28Axi86flBQTMySGwnncj0X9wG', 'admin', '2025-02-13 19:32:31', 'Lévêque', 'Alexis'),
(3, 'alexis@icloud.com', '$2y$10$sBRZY/evCrONBYlIhnAyZ.xoFZ1s4g5en6OhdWZuXN5NMyRKTo1Um', 'admin', '2025-02-13 21:40:26', 'Leveque', 'Alexis');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `author` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `date`, `author`, `image`) VALUES
(14, 'Les portes du monde', 'Présentation : une odyssée artistique à travers des portes symboliques où chaque teinte, chaque style est une invitation au voyage. Ces portes nous conduiront vers d’autres mondes, d’autres couleurs, pour ainsi capturer l’essense même des ancrages culturels. Elles sont le reflet du monde. Pousser le porte, c\'est quitter le connu pour l’inconnu, le profane pour le sacré, le matériel pour le spirituel, le terrestre pour le céleste ou encore les ténèbres par la lumière.', '2025-02-19', 'Isabelle', 'http://localhost:8888/ccc/www/uploads/eec3a15a1c48893c9826c9761ce86a33.jpg'),
(15, 'All Posts Spectacle 2022 Concours National CND', 'Le 20 mai 2023, suite à son premier prix au concours régional de Cognac, Lison a rejoint le parc des expositions d\'Angers pour le concours national.\r\nFélicitations à Lison qui a obtenu un second prix médaille d\'argent!', '2025-02-19', 'Isabelle', 'http://localhost:8888/ccc/www/uploads/4e1e6b5d1aac8fa8d69fca87a39e8c90.jpg'),
(17, 'Spectacle 2023', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-02-19', 'Emerick', 'http://localhost:8888/ccc/www/uploads/2afefb1bca0a19ba55e3a8e4f3ab8152.webp'),
(18, 'Concours CND mars 2023', 'Un beau week end de concours qui se termine \r\nUne pluie de récompenses, de stress, joies, de pleurs de joies, de travail et de persévérance.\r\nUne grande fierté pour VDEA.\r\nMerci aux élèves, merci à Isabelle, merci aux parents pour toute cette bonne humeur ', '2025-02-19', 'Isabelle', 'http://localhost:8888/ccc/www/uploads/a49b6ea9361f2a0cfebc076c285ecf95.webp');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `titre`, `description`, `image`) VALUES
(1, 'Programme Modern&#039; Jazz', 'Jazz 1 (CE2 - CM2) → Mardi 18h00 - 19h00 / Jazz 2 (6ème - 5ème) → Vendredi 18h15 - 19h15 / Intermédiaire (4ème - 3ème) → Jeudi 18h30 - 19h30 / Moyen / Avancé (Lycée) → Jeudi 19h30 - 21h00 / Adultes → Mardi 20h15 - 21h45', 'http://localhost:8888/ccc/www/uploads/5555cedfc71dfe228826498f1f83b0e2.jpg'),
(5, 'Programme Danse Classique', 'Débutant (à partir de 8 ans) → Mardi 17h00 - 18h00 / Élémentaire (collège et plus) → Vendredi 19h15 - 20h30', 'http://localhost:8888/ccc/www/uploads/4c15a3898f19e70fe664e6cea8023bf6.jpg'),
(6, 'Programme Barre à Terre', 'À partir de 15 ans → Vendredi 20h30 - 21h15', 'http://localhost:8888/ccc/www/uploads/f44f59ccec142a9731cdad12b0ef27e9.jpg'),
(7, 'Programme Éveil à la Danse & Initiation', 'Éveil à la danse (à partir de 4 ans) → Vendredi 17h30 - 18h15 / Initiation (CP - CE1) → Jeudi 17h30 - 18h30', 'http://localhost:8888/ccc/www/uploads/72e600a190836c302ef952db402aae05.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
