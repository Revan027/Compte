<table CELLPADDING='9'>
     <tr>
         <?php for ($i = 0; $i < count($arrAll); $i++) { ?>
         <?php 
                if($i%2){ ?>
               <td id="pair">
                 <?= $arrAll[$i]["libelle"] ?> = <?= $arrAll[$i]["somme"] ?>
             </td>
             
                <?php   }else{?>
                    
                   <td id="impair">
                 <?= $arrAll[$i]["libelle"] ?> = <?= $arrAll[$i]["somme"] ?>
             </td>
                
 
         <?php }} ?>
     </tr>
 </table>