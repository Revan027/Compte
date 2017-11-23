<?php

include("./getDB.php");

 if(isset($_POST['id']) && isset($_POST['annee'])){
     
    $id = $_POST['id'];
    $annee = $_POST['annee'];

    supprimerDB($id, $annee);
 }

