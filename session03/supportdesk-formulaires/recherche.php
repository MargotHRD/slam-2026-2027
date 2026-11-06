<form class="formulaire formulaire-recherche"
      action="recherche.php"
      method="get">
    <div class="champ">
        <label for="mot">Mot-clé</label>
        <input type="search" id="mot" name="mot">
    </div>
    <button class="bouton" type="submit">
        Rechercher
    </button>
</form>

<?php 
$mot = trim($_GET["mot"] ?? "");
$incidents = [];
if ($mot !== "") {
    $con = connexion();
    if ($con === null) {
        exit("Connexion impossible à la base de données.");
    }
    $incidents = rechercherIncidents($con, $mot);
    // Le résultat est maintenant un tableau PHP.
    // MySQL n'est plus nécessaire pour générer la page.
    deconnexion($con);
}
?>