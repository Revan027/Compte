<?php

include("./getDB.php");


$id = $_POST['id'];
$annee = $_POST['annee'];

supprimerDB($id, $annee);
