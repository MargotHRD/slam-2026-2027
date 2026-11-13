<?php foreach ($categories as $categorie): ?>
    <tr>
        <td><?=(int)$categorie['id']?></td>
        <td><?=htmlspecialchars($categorie['libelle'],ENT_QUOTES,'UTF-8')?></td>
    </tr>

<?php endforeach; ?>