<?php if (!empty($arrAll)) { ?>
    <fieldset id="fieldset2"> <legend>Choisissez votre année</legend>
        <table CELLPADDING='11' cellspacing="4" id="table1">
            <tr>
                <td class='titreA'>Année</td>
                <?php foreach ($arrAll as $tableau) { ?>
                    <td class="fondA" id="<?= $tableau["annee"] ?>" onclick='createXHR2((this.id))'><?= $tableau["annee"] ?></td>
                <?php } ?>
            </tr>
        </table>
    </fieldset><br/>

<?php } ?>
