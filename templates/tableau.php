<table CELLPADDING='13' cellspacing="0" id="table1"">
    <tr class='titremois'>
        <td class='fondMois'>Mois</td>
        <?php for ($i = 0; $i < $tailleTab; $i++) { ?>
            <td class='fondMois'>
                <?= $arrAll[$i]["mois"] ?>
                <img onclick='confirmation("<?= $arrAll[$i]['id'] ?>","<?= $annee ?>");' id='croix' src='./images/croix.png'/>
            </td>
        <?php } ?>
    </tr>
    
    <tr class='hover'>
        <td class='fondG'>Rentrées d'argents</td>
        <?php for ($i = 0; $i < $tailleTab; $i++) { ?>
            <td class='fondG'><?= $arrAll[$i]['salaire'] ?></td>
        <?php } ?>
    </tr>
    
    <tr class='hover'>
        <td class='fondW'>Dépenses</td>
        <?php for ($i = 0; $i < $tailleTab; $i++) { ?>
            <td class='fondW'><?= $arrAll[$i]['depense'] ?></td>
        <?php } ?>
    </tr>
    
    <tr class='hover'>
        <td class='fondG'>Bénéfices</td>
        <?php for ($i = 0; $i < $tailleTab; $i++) { 
            if($arrAll[$i]['benefice']<=0){ ?> 
                <td  class='fondGR'><?= $arrAll[$i]['benefice'] ?></td>   
            <?php }else{ ?>    
                <td class='fondG'><?= $arrAll[$i]['benefice'] ?></td>
             <?php } ?>
            <?php $benefAnnu = $benefAnnu + $arrAll[$i]['benefice']; ?>
        <?php } ?>
    </tr>

    <?php if ($scinder == true) { ?>
        <tr class='titremois'>
            <td class='fondMois''>Mois</td>
            <?php for ($i = 6; $i < $tailleTabScinder; $i++) { ?>
                <td class='fondMois'>
                    <?= $arrAll[$i]["mois"] ?>
                    <img onclick='confirmation("<?= $arrAll[$i]['id'] ?>","<?= $annee ?>");' id='croix' src='./images/croix.png'/>
                </td>
            <?php } ?>
        </tr>
        
        <tr class='hover'>
            <td class='fondG'>Rentrées d'argents</td>
            <?php for ($i = 6; $i < $tailleTabScinder; $i++) { ?>
                <td class='fondG'><?= $arrAll[$i]['salaire'] ?></td>
            <?php } ?>
        </tr>
        
        <tr class='hover'>
            <td class='fondW'>Dépenses</td>
            <?php for ($i = 6; $i < $tailleTabScinder; $i++) { ?>
                <td class='fondW'><?= $arrAll[$i]['depense'] ?></td>
            <?php } ?>
        </tr>
        
        <tr class='hover'>
            <td class='fondG'>Bénéfices</td>
            <?php for ($i = 6; $i < $tailleTabScinder; $i++) { 
            if($arrAll[$i]['benefice']<=0){ ?> 
                <td class='fondGR'><?= $arrAll[$i]['benefice'] ?></td>   
            <?php }else{ ?>    
                <td class='fondG'><?= $arrAll[$i]['benefice'] ?></td>
             <?php } ?>
            <?php $benefAnnu = $benefAnnu + $arrAll[$i]['benefice']; ?>
        <?php } ?>
        </tr>
            
        <tr class='hover' >
            <td class='fondGT'>Bénéfice Annuelle</td>
            <td class='fondGT' colspan='<?= 6 ?>'><?= $benefAnnu ?></td>
        </tr>
    
    <?php }else{ ?>
        <tr class='hover' >
            <td class='fondGT'>Bénéfice Annuelle</td>
            <td class='fondGT' colspan='<?= $tailleTab ?>'><?= $benefAnnu ?></td>
        </tr>
    <?php } ?>
</table>
