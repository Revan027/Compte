<?php

/**
 * 
 * @return \PDO
 */
function connection() {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=compte", "root", "revan27");
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

    for ($i = 1; $i <= 12; $i++) {
        if ($mois == $tableauMois[$i]) {
            return $i;
        }
    }
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
    echo "<h3> Visualisation</h3>";

    if (!empty($arrAll)) {
        echo "<div id='selectionAnnee'><ol name='liste'>";

        foreach ($arrAll as $tableau) {
            echo "<li id=" . $tableau["annee"] . " onclick='createXHR2((this.id))'>" . $tableau["annee"] . "</li>"; //this est un objet de type element.on veut l id de cette element
        }

        echo "</ol></div>";
    } else {
        return null;
    }
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

        echo"<table CELLPADDING='7'>";
        echo"<tr>
						<td class='titremois'>Mois</td>";

        for ($i = 0; $i < $tailleTab; $i++) {

            $id = $arrAll[$i]['id']; //on recupere l'id de chaque ligne pour la suppression
            echo " <td class='fondMois'>" . ($arrAll[$i]["mois"]) . "<img onclick='confirmation(" . "\"" . $id . "\"" . "," . "\"" . $annee . "\"" . ");' id='croix' src='./images/croix.png'/></td>";
        }

        echo"
					</tr>
					<tr class='hover'>
						<td class='fondTAutreTitre'>Rentrées d'argents</td>";

        for ($i = 0; $i < $tailleTab; $i++) {
            echo "<td class='fondDonnee'>" . ($arrAll[$i]['salaire']) . "</td>";
        }

        echo"
					</tr>
					<tr class='hover'>
						<td class='fondTAutreTitre'>Dépenses</td>";

        for ($i = 0; $i < $tailleTab; $i++) {
            echo "<td class='fondDonnee'>" . ($arrAll[$i]['depense']) . "</td>";
        }
        echo"
					</tr>
					<tr class='hover'>
						<td class='fondTAutreTitre'>Bénéfices</td>";

        for ($i = 0; $i < $tailleTab; $i++) { //recuperation de chaque benefice mensuel pour calculer l'annuelle
            echo "<td class='fondDonnee'>" . ($arrAll[$i]['benefice']) . "</td>";
            $benefAnnu = $benefAnnu + $arrAll[$i]['benefice'];
        }

        echo"</tr>";

        if ($scinder == true) {

            echo"<tr>
						<td class='titremois'>Mois</td>";

            for ($i = 6; $i < $tailleTabScinder; $i++) {
                $id = $arrAll[$i]['id'];
                echo " <td class='fondMois'>" . ($arrAll[$i]["mois"]) . "<img onclick='confirmation(" . "\"" . $id . "\"" . "," . "\"" . $annee . "\"" . ");' id='croix' src='./images/croix.png'/></td>";
            }

            echo"
						</tr>
						<tr class='hover'>
							<td class='fondTAutreTitre'>Rentrées d'argents</td>";

            for ($i = 6; $i < $tailleTabScinder; $i++) {
                echo "<td class='fondDonnee'>" . ($arrAll[$i]['salaire']) . "</td>";
            }

            echo"
						</tr>
						<tr class='hover'>
							<td class='fondTAutreTitre'>Dépenses</td>";

            for ($i = 6; $i < $tailleTabScinder; $i++) {
                echo "<td class='fondDonnee'>" . ($arrAll[$i]['depense']) . "</td>";
            }
            echo"
						</tr>
						<tr class='hover'>
							<td class='fondTAutreTitre'>Bénéfices</td>";

            for ($i = 6; $i < $tailleTabScinder; $i++) {//recuperation de chaque benefice mensuel pour calculer l'annuelle
                echo "<td class='fondDonnee'>" . ($arrAll[$i]['benefice']) . "</td>";
                $benefAnnu = $benefAnnu + $arrAll[$i]['benefice'];
            }
        }
        echo"</tr>
					 <tr class='hover' >
							<td class='fondTAutreTitre'>Bénéfice Annuelle</td>";
        echo "<td class='fondDonnee' colspan='6'>" . $benefAnnu . "</td>
					 </tr>";


        echo"</table>";
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
function ajouterDB($annee, $salaire, $depense, $mois, $benefice) {

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
