<?php

if(isset($_POST['login']) && $_POST['mdp']) { 
    
    include("../Model/getLog.php");
    getSession($_POST['login'],$_POST['mdp']);
}else{
     header ('location: ../index.php');   
}