CREATE DATABASE `escape-game` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `escape-game`;

CREATE TABLE `questions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `question` TEXT NOT NULL,
  `reponse` VARCHAR(255) NOT NULL,
  `message_success` TEXT NOT NULL,
  `message_failure` TEXT NOT NULL,
  `total_essais` INT DEFAULT 0,
  `total_reussites` INT DEFAULT 0
);

INSERT INTO `questions` (`id`, `question`, `reponse`, `message_success`, `message_failure`, `total_essais`, `total_reussites`) VALUES
(6, 'Quelle est la capitale de la France ?', 'paris', 'Bravo ! Paris est bien la capitale de la France.', 'Désolé, ce n\'est pas la bonne réponse.', 3, 2),
(7, 'Combien font 12 + 15 ?', '27', 'Correct ! 12 + 15 = 27.', 'Mauvaise réponse. La bonne réponse est 27.', 1, 1),
(8, 'Quel est ma couleur favorite ?', 'violet', 'Oui, c\'est un peu dans ma charte graphique.', 'Non désolé, indice : elle est dans ma charte.', 0, 0),
(9, 'J\'ai posté combien de dessins ?', '4', 'Oui, j\'en ai 4 (pour l\'instant).', 'Non désolé, tu peux aller voir sur ma galerie.', 0, 0);
