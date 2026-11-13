DROP DATABASE IF EXISTS supportdesk;
CREATE DATABASE supportdesk
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE supportdesk;

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'utilisateur'
);

CREATE TABLE categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE incident (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    priorite VARCHAR(20) NOT NULL,
    statut VARCHAR(20) NOT NULL DEFAULT 'ouvert',
    utilisateur_id INT NOT NULL,
    categorie_id INT NOT NULL,
    date_creation DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id),
    FOREIGN KEY (categorie_id) REFERENCES categorie(id)
);

-- Le mot de passe de dÃ©monstration est : Demo123!
INSERT INTO utilisateur (
    nom,
    email,
    mot_de_passe,
    role
) VALUES
(
    'Alice Martin',
    'alice@example.com',
    '$2y$12$jLOZyZnMjugJBlXrG00z5.7nk99eZlRi1Kn005ZLK5bR5ASC/ojRa',
    'utilisateur'
),
(
    'Karim Benali',
    'karim@example.com',
    '$2y$12$jLOZyZnMjugJBlXrG00z5.7nk99eZlRi1Kn005ZLK5bR5ASC/ojRa',
    'utilisateur'
),
(
    'Administrateur',
    'admin@example.com',
    '$2y$12$jLOZyZnMjugJBlXrG00z5.7nk99eZlRi1Kn005ZLK5bR5ASC/ojRa',
    'admin'
);

INSERT INTO categorie (libelle) VALUES
('MatÃ©riel'),
('Logiciel'),
('RÃ©seau'),
('Compte utilisateur');

INSERT INTO incident (
    titre,
    description,
    priorite,
    statut,
    utilisateur_id,
    categorie_id
) VALUES
(
    'Wi-Fi impossible',
    'Le poste ne se connecte plus au rÃ©seau.',
    'haute',
    'ouvert',
    1,
    3
),
(
    'Erreur logiciel',
    'Une erreur apparaÃ®t au lancement.',
    'normale',
    'en_cours',
    1,
    2
),
(
    'Ã‰cran secondaire',
    'Le deuxiÃ¨me Ã©cran ne s\'allume plus.',
    'basse',
    'ouvert',
    2,
    1
);
 