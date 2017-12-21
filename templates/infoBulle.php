<div id='infoBulleBox'>
    <fieldset id="fieldset3">
        <center><b>Dépenses</b></center><div id='barre2'></div>
        <marquee scrollamount='2' direction='up'>
            <?php for ($i = 0; $i < (count($tableauDesNombres)); $i++) { ?>
               
                    - <?php echo $tableauDesNombres[$i] ?></br> 
                        
               <?php } ?>                
       </marquee>
    </fieldset>
</div>         