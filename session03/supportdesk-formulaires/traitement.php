<?php
require_once __DIR__ . "/fonctions/fonctions.php";

// Si la page est appelée autrement qu'avec le formulaire en POST,
// on refuse le traitement.
if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    // 405 = Method Not Allowed.
    // La page existe, mais la méthode HTTP utilisée n'est pas autorisée.
    http_response_code(405);

    // On arrête immédiatement le script.
    exit("Méthode non autorisée.");
}
// trim() retire les espaces inutiles au début et à la fin.

$titre = trim($_POST["titre"] ?? "");
$description = trim($_POST["description"] ?? "");
$priorite = $_POST["priorite"] ?? "";

// Les identifiants doivent être des entiers.
$utilisateur_id = (int) ($_POST["utilisateur_id"] ?? 0);
$categorie_id = (int) ($_POST["categorie_id"] ?? 0);


$erreurs = [];
$prioriteAutorisee = ["Basse","Normale","Haute"];


if ($titre === "") {
    $erreurs[] = "Le titre est obligatoire.";
}

if ($priorite === "") {
    $erreurs[] = "La priorité est obligatoire.";
}elseif(!in_array($priorite,$prioriteAutorisee,true))
{
    $erreur[] = "La priorité est invalide.";
}

if ($description === "") {
    $erreurs[] = "La description est obligatoire.";
}
if ($utilisateur_id <= 0) {
    $erreurs[] = "Utilisateur invalide.";
}

if ($categorie_id <= 0) {
    $erreurs[] = "Catégorie invalide.";
}

if (count($erreurs) > 0) {
    foreach ($erreurs as $erreur) {

    // L'instruction vulnérable aux injecions SQL
    //echo $erreur . "<br>" ;

    
        echo "<p>"
           . htmlspecialchars($erreur, ENT_QUOTES, "UTF-8")
           . "</p>";

    
    }

    // Rien ne doit être enregistré tant qu'il existe une erreur.
    exit;
}

$con = connexion();
if ($con === null) {
    exit("Connexion impossible à la base de données.");
}

$ok = ajouterIncident(
    $con,
    $titre,
    $description,
    $priorite,
    $utilisateur_id,
    $categorie_id
);
// L'INSERT est terminé : la connexion MySQL n'est plus utile.
deconnexion($con);
if ($ok) {
    header("Location: liste.php?creation=ok");
    exit;
}
exit("Erreur lors de l'enregistrement de l'incident.");



?>