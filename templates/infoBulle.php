
<div id='infoBulleBox'>
    
    <div id='infoBulleHaut'>

        <div id='titreInfoBulleHaut'><center>Dépense</center> <div id='barre2'></div> </div>

    </div>

    <div id='infoBulleCentre'>
        <marquee scrollamount='2' direction='up'>
            <?php for ($i = 0; $i < (count($tableauDesNombres)); $i++) { ?>
               
                    - <?php echo $tableauDesNombres[$i] ?></br> 
                        
               <?php } ?>                 
       </marquee>
    </div>  

    <div id='infoBulleBas'></div>

</div>         