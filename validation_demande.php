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
    if (
        $demande["etat"] === "nouvelle"
        && $utilisateur["actif"] === true #ou && !$utilisateur["actif"] 
        && ($utilisateur["role"] === "administrateur" 
        || ($utilisateur["role"] === "gestionnaire" 
        && $demande["montant"] <= 1000))
    ) {
        $compteur++;
        echo "Demande ID: " . $demande["id"] . " est valide pour traitement.<br>";
    }
    else {
        echo "Demande ID: " . $demande["id"] . " n'est pas valide pour traitement.<br>";
    }
}

echo "Nombre total de demandes valides pour traitement: " . $compteur . "<br>";

?>
