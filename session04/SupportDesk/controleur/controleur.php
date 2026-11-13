<?php

require_once __DIR__ ."/../modele/modele.php";
// Inclut le fichier modele.php une seule fois.
// __DIR__ donne le dossier de ce fichier (controleur/).
// "/../modele/modele.php" remonte d'un dossier, puis entre dans modele/.
// Cela rend la classe "modele" utilisable dans ce fichier.
// require_once évite de charger deux fois le même fichier, ce qui provoquerait une erreur.

class controleur {
    // Déclare la classe "controleur". Tout son contenu est entre les accolades.

    private $unModele;
    // Déclare une propriété "unModele".
    // "private" : accessible uniquement depuis l'intérieur de la classe.
    // Elle contiendra un objet de type modele ("un modèle" en français).

    public function __construct() {
        // Déclare le constructeur, méthode appelée automatiquement au "new controleur()".
        // "public" : accessible de l'extérieur de la classe.

        $this->unModele = new modele();
        // Crée un objet modele avec "new modele()" et le range dans la propriété.
        // $this désigne l'objet courant (le controleur en cours de création).
        // La flèche -> accède à une propriété ou une méthode de cet objet.
    }

    // Fin du constructeur.

    public function selectAll_incident() {
        return $this->unModele->selectAll_incident();
    }

    public function selectAll_categorie() {
        return $this->unModele->selectAll_categorie();
    }

}

?>
