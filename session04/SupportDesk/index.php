<?php
include("Modele/Modele.php");
include("Controleur/Controleur.php");
$controleur = new Controleur();
$lesIncidents = $controleur->selectAll_incident();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk</title>
</head>
<body>

<h2>Liste des incidents</h2>

<?php include("Vue/Vue_Selectall_Incidents.php"); ?>
    
</body>
</html>


