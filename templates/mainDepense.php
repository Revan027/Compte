<table CELLPADDING='9'>
     <tr>
         <?php $separate=0; for ($i = 0; $i < count($arrAll); $i++) { ?>
             <?php  if($i%2 == 0){ ?>

                        <td id="pair">
                            <img id='croix2' onclick='deleteMainDepense("<?=  $arrAll[$i]['id'] ?>");' src='./images/croix.png'/>
                            <b> <?=  $arrAll[$i]["libelle"] ?></b> <div id="somme"> <?= $arrAll[$i]["somme"] ?> euros </div>
                        </td>

                        <?php  $separate =  $separate+1; 
                     }else if($i==0 || $i==1 || $i!=0){?>

                        <td id="impair"> 
                            <img id='croix2' onclick='deleteMainDepense("<?= $arrAll[$i]['id']  ?>");'  src='./images/croix.png'/>
                            <b> <?=  $arrAll[$i]["libelle"] ?></b> <div id="somme"><?= $arrAll[$i]["somme"] ?> euros</div>
                        </td>
                    <?php  $separate =  $separate+1;  }
                    
            if($separate==5){ $separate=0; ?>
                 </tr><tr>   
  
            <?php  }
         }  ?>
 
    </tr>
    <tr>
        <td id="total"> Total :    </td>
    </tr>
 </table>
