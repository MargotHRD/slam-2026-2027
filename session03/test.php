<?php

var_dump(5 == "5"); // true + compare uniquement la valeur de la variable
var_dump(5 === "5"); // false + compare la valeur et le type de la variable

//var_dump affiche les informations sur les données d'une variable

$badgeValide = true;
$suspendu = false;

if ($badgeValide && !$suspendu){
    echo "Accès autorisé";
} else {
    echo "Accès refusé";
}


function peutCommander(bool $compteValide, int $stock): bool
{
   if (!$compteValide || $stock <= 0){
        return false;
        }else {
            return true;
        }
   }

echo peutCommander(true,3) ? "Oui" : "Non";