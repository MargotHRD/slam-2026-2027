<?php

class modele {
// Déclare la classe "modele". Tout son contenu est entre les accolades.
    private $pdo;   

    public function __construct() {
        // Déclare le constructeur, méthode appelée automatiquement au "new modele()".
        // "public" : accessible de l'extérieur de la classe.
    $this->pdo = null;

    try {
        $this->pdo = new PDO("host=localhost;dbname=supportdesk;charset=utf8mb", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
    }

    public function selectAll_incident() {
        $sql = "SELECT i.id, i.titre, i.priorite, i.statut, c.libelle as categorie
                FROM incident i
                INNER JOIN categorie c 
                ON i.categorie_id = c.id
                ORDER BY i.date_creation DESC";

                $requete = $this->pdo->prepare($sql);
                $requete->execute();

                return $requete->fetchAll();
                //fetchAll() récupère toutes les lignes de résultats sous forme de tableau associatif contrairement à fetch() qui ne récupère qu'une seule ligne.
    }

    public function selectAll_categorie(){
        $sql = "SELECT * FROM categorie";

        $requete = $this->pdo->prepare($sql);
        $requete->execute();
        
        return $requete->fetchAll();
    }
}
?>