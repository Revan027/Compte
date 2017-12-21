<?php

/**
 * 
 * @return \PDO
 */
function connection() {
    $parameters = include __DIR__ . '/../Parametres/parameters.php';
    try {
        $pdo = new PDO("mysql:host={$parameters['db']['host']};dbname={$parameters['db']['dbname']}", $parameters['db']['user'], $parameters['db']['password']);
        return $pdo;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

/**
 * permet de faire correspondre un id au mois pour les trier via une requete lors de l'affichage
 * 
 * @param type $mois
 * @return int
 */
function trierMois($mois) {
    $tableauMois = array('Rien', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    return array_search($mois, $tableauMois);
}

/**
 * 
 * @return type
 */
function afficherAnnee() { //affiche les annees enregistré dans la bd
    $pdo = connection();
    $stmt = $pdo->prepare('SELECT DISTINCT annee FROM resume ORDER BY annee');
    $stmt->execute();
    $arrAll = $stmt->fetchAll();
    
    include __DIR__ . '/../templates/annee.php';
    
    $stmt->closeCursor();
    $stmt = NULL;
}

/**
 * 
 * @param type $annee
 */
function afficherTableau($annee) { //affiche le tableau de compte
    $benefAnnu = 0;
    $pdo = connection();
    $stmt = $pdo->prepare('SELECT id,mois,salaire,depense,benefice FROM resume WHERE annee=:annee ORDER BY numMois');
    $stmt->bindValue(':annee', $annee, PDO::PARAM_STR);
    $stmt->execute();
    $arrAll = $stmt->fetchAll();

    afficherAnnee();

    $scinder = false;
    $tailleTab;
    $tailleTabScinder;

    if (!empty($arrAll)) {

        if ((count($arrAll)) <= 6) { //si le nombre de mois a afficher est inférieur ou égale a 6 (6 mois)on ne scinde pas l'affichage
            $scinder = false;
            $tailleTab = count($arrAll);
        } else {
            $scinder = true;
            $tailleTab = 6;
            $tailleTabScinder = count($arrAll); //recuperation de la taille du tableau de la  requete pour la 2eme partie de l'affichage
        }
        include __DIR__ . '/../templates/tableau.php';
        
        $stmt->closeCursor();
        $stmt = NULL;
    }
}

/**
 * 
 * @param type $annee
 * @param type $salaire
 * @param type $depense
 * @param type $mois
 * @param type $benefice
 */
function ajouterDB($annee, $salaire, $depense, $mois, $benefice, $tableauDesNombres) {

    $numMois = trierMois($mois);

    $pdo = connection();

    $stmt = $pdo->prepare('SELECT mois FROM resume WHERE annee=:annee AND mois=:mois');

    $stmt->bindValue(':annee', $annee, PDO::PARAM_STR);
    $stmt->bindValue(':mois', $mois, PDO::PARAM_STR);

    $stmt->execute();
    $arrAll = $stmt->fetchAll();

    if ((count($arrAll)) != 0) { //si la taille est supérieur à 0, le mois exite déja
        header("HTTP/1.1 400 MONTH_EXIST");
        $stmt->closeCursor();
        $stmt = NULL;
    } else {

        $stmt = $pdo->prepare('INSERT INTO resume(annee,numMois,mois,salaire,depense,benefice) VALUES(:annee,:numMois,:mois,:salaire,:depense,:benefice)');
        $stmt->execute(array(
            ':annee' => $annee,
            ':numMois' => (int) $numMois,
            ':mois' => $mois,
            ':salaire' => $salaire,
            ':depense' => $depense,
            ':benefice' => $benefice
        ));
        
        require_once '../templates/infoBulle.php';
        afficherTableau($annee); //apelle la fonction affichant la base de donnée.sert de reponse pour le flux ajax

        $stmt->closeCursor();
        $stmt = NULL;
    }
}

/**
 * 
 * @param type $id
 * @param type $annee
 */
function supprimerDB($id, $annee) {

    $pdo = connection();
    $stmt = $pdo->prepare('DELETE FROM resume WHERE id=:id');
    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
    $stmt->execute();

    afficherTableau($annee);

    $stmt->closeCursor();
    $stmt = NULL;
}
