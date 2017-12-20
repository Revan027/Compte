<table CELLPADDING='9' style="font-size:13px;">
     <tr>
         <?php $separate=0; $totalMainDep = 0; for ($i = 0; $i < count($tabMainDepense); $i++) { ?>
             <?php  if($i%2 == 0){ ?>

                        <td id="pair">
                            <img id='croix2' onclick='deleteMainDepense("<?=  $tabMainDepense[$i]['id'] ?>");' src='./images/croix.png'/>
                           
                            <b> <?=  $tabMainDepense[$i]["libelle"] ?></b> <div id='barre2'></div>  <div id="somme"> <?= $tabMainDepense[$i]["somme"] ?> euros </div>
                        </td>

                        <?php  $separate =  $separate+1; $totalMainDep = $totalMainDep +$tabMainDepense[$i]["somme"];
                     }else if($i==0 || $i==1 || $i!=0){?>

                        <td id="impair"> 
                            <img id='croix2' onclick='deleteMainDepense("<?= $tabMainDepense[$i]['id']  ?>");'  src='./images/croix.png'/>
                            
                            <b> <?=  $tabMainDepense[$i]["libelle"] ?></b> <div id='barre2'></div> <div id="somme"><?= $tabMainDepense[$i]["somme"] ?> euros</div>
                        </td>
                    <?php  $separate =  $separate+1; $totalMainDep = $totalMainDep +$tabMainDepense[$i]["somme"]; }
                    
            if($separate==5){ $separate=0; ?>
                 </tr><tr>   
  
            <?php  }
         }  ?>
    </tr> 
 </table>
