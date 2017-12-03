<?php if (!empty($arrAll)) { ?>
    <table CELLPADDING='11' cellspacing="4" id="table1">
    <tr>
        <td class='titremois'>Année</td>
        <?php foreach ($arrAll as $tableau) { ?>
            <td class="fondDonneeA" id="<?= $tableau["annee"] ?>" onclick='createXHR2((this.id))'><?= $tableau["annee"] ?></td>
        <?php } ?>
    </tr>
    </table><br/>

<?php } ?>
