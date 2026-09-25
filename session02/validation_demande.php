<?php

$utilisateur = array(
    "nom" => "Nora",
    "actif" => true,
    "role" => "gestionnaire"
);

$demandes = array(
    array("id" => 101, "etat" => "nouvelle", "montant" => 250),
    array("id" => 102, "etat" => "validee", "montant" => 900),
    array("id" => 103, "etat" => "nouvelle", "montant" => 1400)
);

$compteur = 0;

foreach ($demandes as $demande) {
    if (peutValider($utilisateur, $demande)){
        $compteur++;
        echo "Demande ID: " . $demande["id"] . " est valide pour traitement.<br>";
    }
    else {
        echo "Demande ID: " . $demande["id"] . " n'est pas valide pour traitement.<br>";
    }
}

echo "Nombre total de demandes valides pour traitement: " . $compteur . "<br>";

function peutValider(array $utilisateur, array $demande): bool
{
    if(!$utilisateur["actif"]) {
        return false;
    }
    if(!$demande["etat"] === "nouvelle") {
        return false;
    }
        return $utilisateur["role"] === "administrateur" || ($utilisateur["role"] === "gestionnaire" && $demande["montant"] <= 1000);
}

function compterDemandesValidables(array $utilisateur, array $demandes): int
{
    $compteur = 0;
    foreach ($demandes as $demande) {
        if (peutValider($utilisateur, $demande)) {
            $compteur++;
        }
    }
    return $compteur;
}


?>
