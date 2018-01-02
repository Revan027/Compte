<?php

include __DIR__ . '/getDB.php';

function getSession($login, $mdp) {
    $pdo = connection();
    $stmt = $pdo->prepare('SELECT mdp FROM log where login=:login');
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch();

    if ((password_verify($mdp, $data['mdp'])) == 1) {

        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
    }

    //redirection de page
    header('location: ../index.php');
}
