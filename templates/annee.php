<h3>Visualisation</h3>

<?php if (!empty($arrAll)) { ?>
    <div id='selectionAnnee'>
        <ol name='liste'>
            <?php foreach ($arrAll as $tableau) { ?>
                <li id="<?= $tableau["annee"] ?>" onclick='createXHR2((this.id))'><?= $tableau["annee"] ?></li>
            <?php } ?>
        </ol>
    </div>
<?php } ?>
