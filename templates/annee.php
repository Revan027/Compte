<?php if (!empty($arrAll)) { ?>
    <table CELLPADDING='5' cellspacing="4" id="table1">
        <tr>
            <td class='titreA'>Choisissez l'année à afficher</td>
            <?php foreach ($arrAll as $tableau) { ?>
                <td class="fondA" id="<?= $tableau["annee"] ?>" onclick='createXHR2((this.id))'><?= $tableau["annee"] ?></td>
            <?php } ?>
        </tr>
    </table>
<?php } ?>
