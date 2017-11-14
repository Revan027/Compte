<table CELLPADDING='9'>
    <tr>
        <td class='titremois'>Mois</td>
        <?php for ($i = 0; $i < $tailleTab; $i++) { ?>
            <td class='fondMois'>
                <?= $arrAll[$i]["mois"] ?>
                <img onclick='confirmation("<?= $arrAll[$i]['id'] ?>","<?= $annee ?>");' id='croix' src='./images/croix.png'/>
            </td>
        <?php } ?>
    </tr>
    
    <tr class='hover'>
        <td class='fondTAutreTitre'>Rentrées d'argents</td>
        <?php for ($i = 0; $i < $tailleTab; $i++) { ?>
            <td class='fondDonnee'><?= $arrAll[$i]['salaire'] ?></td>
        <?php } ?>
    </tr>
    
    <tr class='hover'>
        <td class='fondTAutreTitre'>Dépenses</td>
        <?php for ($i = 0; $i < $tailleTab; $i++) { ?>
            <td class='fondDonnee'><?= $arrAll[$i]['depense'] ?></td>
        <?php } ?>
    </tr>
    
    <tr class='hover'>
        <td class='fondTAutreTitre'>Bénéfices</td>
        <?php for ($i = 0; $i < $tailleTab; $i++) { ?>
            <?php $benefAnnu = $benefAnnu + $arrAll[$i]['benefice']; ?>
            <td class='fondDonnee'><?= $arrAll[$i]['benefice'] ?></td>
        <?php } ?>
    </tr>
 </table>
<table CELLPADDING='9'>
    <?php if ($scinder == true) { ?>
    
        <tr>
            <td class='titremois'>Mois</td>
            <?php for ($i = 6; $i < $tailleTabScinder; $i++) { ?>
                <td class='fondMois'>
                    <?= $arrAll[$i]["mois"] ?>
                    <img onclick='confirmation("<?= $arrAll[$i]['id'] ?>","<?= $annee ?>");' id='croix' src='./images/croix.png'/>
                </td>
            <?php } ?>
        </tr>
        
        <tr class='hover'>
            <td class='fondTAutreTitre'>Rentrées d'argents</td>
            <?php for ($i = 6; $i < $tailleTabScinder; $i++) { ?>
                <td class='fondDonnee'><?= $arrAll[$i]['salaire'] ?></td>
            <?php } ?>
        </tr>
        
        <tr class='hover'>
            <td class='fondTAutreTitre'>Dépenses</td>
            <?php for ($i = 6; $i < $tailleTabScinder; $i++) { ?>
                <td class='fondDonnee'><?= $arrAll[$i]['depense'] ?></td>
            <?php } ?>
        </tr>
        
        <tr class='hover'>
            <td class='fondTAutreTitre'>Bénéfices</td>
            <?php for ($i = 6; $i < $tailleTabScinder; $i++) { ?>
                <?php $benefAnnu = $benefAnnu + $arrAll[$i]['benefice']; ?>
                <td class='fondDonnee'><?= $arrAll[$i]['benefice'] ?></td>
            <?php } ?>
        </tr>
    
    <?php } ?>
        
    <tr class='hover' >
        <td class='fondTAutreTitre'>Bénéfice Annuelle</td>
        <td class='fondDonnee' colspan='6'><?= $benefAnnu ?></td>
    </tr>

</table>
