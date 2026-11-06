<?php
require_once __DIR__ . "/fonctions/fonctions.php";
$con = connexion();
if ($con === null) {
    exit("Connexion impossible à la base de données.");
}
// Le SELECT retourne toutes les lignes dans un tableau PHP.
$incidents = recupererIncidents($con);
// $incidents existe maintenant indépendamment de MySQL.
// Aucune autre requête n'est prévue sur cette page.
deconnexion($con);
?>

<section class="liste-incidents">



<?php foreach ($incidents as $incident): ?>



    <article class="incident">

        <h2>

            <?= htmlspecialchars($incident["titre"], ENT_QUOTES, "UTF-8") ?>

        </h2>



        <p class="incident-description">

            <?= nl2br(htmlspecialchars(

                $incident["description"], ENT_QUOTES, "UTF-8"

            )) ?>

        </p>



        <dl class="infos-incident">

            <dt>Priorité</dt>

            <dd><?= htmlspecialchars($incident["priorite"], ENT_QUOTES, "UTF-8") ?></dd>

            ...

        </dl>

    </article>



<?php endforeach; ?>



</section>