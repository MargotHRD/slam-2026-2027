<?php foreach ($selectAll_incidents as $incident): ?>
    <tr>
        <td><?=(int)$incident['id']?></td>
        <td><?=htmlspecialchars($incident['titre'],ENT_QUOTES,'UTF-8')?></td>
        <td><?=htmlspecialchars($incident['priorite'],ENT_QUOTES,'UTF-8')?></td>
    </tr>

<?php endforeach; ?>

