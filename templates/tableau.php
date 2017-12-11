<table CELLPADDING='11' cellspacing="4" id="table1">
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
            <td class='fondDonneeS'><?= $arrAll[$i]['salaire'] ?></td>
        <?php } ?>
    </tr>
    
    <tr class='hover'>
        <td class='fondTAutreTitre'>Dépenses</td>
        <?php for ($i = 0; $i < $tailleTab; $i++) { ?>
            <td class='fondDonneeD'><?= $arrAll[$i]['depense'] ?></td>
        <?php } ?>
    </tr>
    
    <tr class='hover'>
        <td class='fondTAutreTitre'>Bénéfices</td>
        <?php for ($i = 0; $i < $tailleTab; $i++) { 
            if($arrAll[$i]['benefice']<=0){ ?> 
                <td  class='fondDonneeBN'><?= $arrAll[$i]['benefice'] ?></td>   
            <?php }else{ ?>    
                <td class='fondDonneeB'><?= $arrAll[$i]['benefice'] ?></td>
             <?php } ?>
            <?php $benefAnnu = $benefAnnu + $arrAll[$i]['benefice']; ?>
        <?php } ?>
    </tr>


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
                <td class='fondDonneeS'><?= $arrAll[$i]['salaire'] ?></td>
            <?php } ?>
        </tr>
        
        <tr class='hover'>
            <td class='fondTAutreTitre'>Dépenses</td>
            <?php for ($i = 6; $i < $tailleTabScinder; $i++) { ?>
                <td class='fondDonneeD'><?= $arrAll[$i]['depense'] ?></td>
            <?php } ?>
        </tr>
        
        <tr class='hover'>
            <td class='fondTAutreTitre'>Bénéfices</td>
            <?php for ($i = 6; $i < $tailleTabScinder; $i++) { 
            if($arrAll[$i]['benefice']<=0){ ?> 
                <td class='fondDonneeBN'><?= $arrAll[$i]['benefice'] ?></td>   
            <?php }else{ ?>    
                <td class='fondDonneeB'><?= $arrAll[$i]['benefice'] ?></td>
             <?php } ?>
            <?php $benefAnnu = $benefAnnu + $arrAll[$i]['benefice']; ?>
        <?php } ?>
        </tr>
            
        <tr class='hover' >
            <td class='fondTAutreTitre'>Bénéfice Annuelle</td>
            <td class='fondDonnee' colspan='<?= 6 ?>'><?= $benefAnnu ?></td>
        </tr>
    
    <?php }else{ ?>
        <tr class='hover' >
            <td class='fondTAutreTitre'>Bénéfice Annuelle</td>
            <td class='fondDonnee' colspan='<?= $tailleTab ?>'><?= $benefAnnu ?></td>
        </tr>
    <?php } ?>
</table>
