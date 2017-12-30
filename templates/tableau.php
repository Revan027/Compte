
 
   <img id="ze" onclick='slideAv();' src='./images/fleche.png'/>
   <img onclick='slideAr(<?= $taille ?>);' src='./images/fleche2.png'/> 		  

 
<div class="blockMois">       
    <div class='titreMois'>Mois</div>                
    <div class='conteneur1'> 
        <div class='co'>
            <?php for ($i = 0; $i < $taille; $i++) { ?>
                 <div class='libelleMois' id='lib0<?= $i+1 ?>'>
                    <?= $arrAll[$i]["mois"] ?>
                    <img onclick='confirmation("<?= $arrAll[$i]['id'] ?>","<?= $annee ?>");' id='croix' src='./images/croix.png'/>
                </div>
            <?php } ?>    
        </div>
    </div>
</div>
   
<div class="blockValeur1">
    <div class='titreValeur1'>Rentrées d'argents</div>
    <div class='conteneur1'>
         <div class='co'>
            <?php for ($i = 0; $i < $taille; $i++) { ?>
                <div class='valeur1' id='lib1<?= $i+1 ?>' ><?= $arrAll[$i]['salaire'] ?></div>
            <?php } ?> 
         </div>
    </div>
</div>

<div class="blockValeur2">
    <div class='titreValeur2'>Dépenses</div>
    <div class='conteneur1'>
        <div class='co'>
            <?php for ($i = 0; $i < $taille; $i++) { ?>
                <div class='valeur2' id='lib2<?= $i+1 ?>' ><?= $arrAll[$i]['depense'] ?></div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="blockValeur1">
        <div class='titreValeur1'>Bénéfices</div>
        <div class='conteneur1'>
            <div class='co'>  
                <?php for ($i = 0; $i < $taille; $i++) { 
                    if($arrAll[$i]['benefice']<=0){ ?> 
                        <div  class='valeur1R' id='lib3<?= $i+1 ?>'><?= $arrAll[$i]['benefice'] ?></div>  
                    <?php }else{ ?>    
                         <div class='valeur1' id='lib3<?= $i+1 ?>'><?= $arrAll[$i]['benefice'] ?></div>
                     <?php } ?>
                    <?php $benefAnnu = $benefAnnu + $arrAll[$i]['benefice']; ?>
                <?php } ?>
             </div>            
        </div>
 </div> 

 <?php 
    
    if($taille<=6){
        $tailleBenefB = $taille*120.4;
        
    }else{
        $tailleBenefB = 6*120.9;
    }
 
 ?>
 
<div class="blockValeur1">
        <div class='titreValeur1'>Bénéfice Annuelle </div>
        <div class='conteneur1'>
            <div class='co'>  
               <div class='valeur1' style=" width:<?= $tailleBenefB ?>px"> <center><?= $benefAnnu ?></center>    </div> 
                    
        </div>
        </div> </div>


