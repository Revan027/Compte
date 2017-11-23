<?php

include('./getDB.php');

if(isset($_POST['annee'])){  
    
    afficherTableau($_POST['annee']);
}
