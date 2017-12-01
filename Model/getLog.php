<?php

    function getSession($login,$mdp){
        include 'getDB.php';
        
        $pdo = connection();
        $stmt = $pdo->prepare('SELECT mdp FROM log where login=:login');
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->execute();
        $arrAll = $stmt->fetchAll();
       
        if ((password_verify($mdp,$arrAll[0]['mdp'] )) == 1) {
            
            session_start ();
            $_SESSION['login'] = $login;
            $_SESSION['mdp'] = $mdp; 

            header ('location: ../index.php');//redirection de page
        }else{
            header ('location: ../index.php');   
        }
    }