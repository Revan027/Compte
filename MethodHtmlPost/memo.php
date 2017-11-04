Solution 2  avec bindValue pour l'ajout
		$stmt->bindValue(':idAnnee', (int)$an, PDO::PARAM_INT);
		$stmt->bindValue(':mois', $mois, PDO::PARAM_STR);
		$stmt->bindValue(':salaire', (int)$salaire, PDO::PARAM_INT);
		$stmt->bindValue(':depense', (int)$depense, PDO::PARAM_INT);
		$stmt->bindValue(':benefice', (int)$benefice, PDO::PARAM_INT);
		$stmt->execute();








		
		if(mysql_connect($serveur,$user,$mot)){
		
		if(mysql_select_db($database)){
			$result = mysql_query("SELECT Mois,Salaire FROM compte");
			while( ($row = mysql_fetch_array($result,MYSQL_ASSOC)) == true ){
						echo "<table border='1' style='text-align:center; width:700px;'>";
						echo "<tr><td>".$row["Mois"]."</td><td>".$row["Salaire"]."</td></tr>";
					}
		}else echo "Base not found";													
	}else echo "Probleme d'acces";
	
	
	
				//require_once("");	//Ajoute directement le code php 
				
	





	
				
	echo "<li id=".$tableau["id"]." onclick='choisirAnnee(this)'>".$tableau["annee"]."</li>";	
				
	function choisirAnnee(element){	//retourne l id de lannee a afficher
				createXHR2(element.id);		
			}
			
				
				
				function createXHR2(id){
	var xhr = null;
    if (window.XMLHttpRequest) { 
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }	
	
	xhr.onreadystatechange = function() {	
		if(xhr.readyState == 4 ) {	//Si etape 4 terminé. Serveur renvoie les données en reponse
			document.getElementById('afficherAnnee').innerHTML = xhr.responseText;	//injecte le code html
		}
	}
    xhr.open("POST", "./afficheAnnee.php", true); 
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("id="+id);  
}














function afficherAnnee(){
		
		$pdo = connection();
		$stmt = $pdo->prepare('SELECT id,annee FROM annee');
		$stmt->execute();
		$arrAll = $stmt->fetchAll();
		
		if(!empty($arrAll)){
			echo "<ol name='liste'>";
			
			foreach($arrAll as $tableau){
				echo "<li id=".$tableau["id"]." onclick='createXHR2((this.id))'>".$tableau["annee"]."</li>";	//this est un objet de type element.on veut l id de cette element
			}
			
			echo "</ol>";
		}
		else{
			return null;
		}
		$stmt->closeCursor();
		$stmt = NULL;
	}	
	
	
	function afficherTableau($id){
		
		$pdo = connection();
		$stmt = $pdo->prepare('SELECT mois,salaire,depense,benefice FROM resume WHERE idAnnee=:id ORDER BY numMois');
		$stmt->bindValue(':id', $id, PDO::PARAM_STR);
		$stmt->execute();
		$arrAll = $stmt->fetchAll();

		echo"<table><caption>Dépense/Salaire</caption>";
			echo"
					<td class='titre_tableau'>Mois</td>";
					foreach($arrAll as $tableau) {
						echo "<td>".$tableau["mois"]."</td>";
					}
			echo"
				</tr>
				<tr>
					<td class='titre_tableau'>Salaire</td>";
					foreach($arrAll as $tableau) {
						echo "<td>".$tableau["salaire"]."</td>";
					}
			echo"
				</tr>
				<tr>
					<td class='titre_tableau'>Dépense</td>";
					foreach($arrAll as $tableau) {
						echo "<td>".$tableau["depense"]."</td>";
					}
			echo"
				</tr>
				<tr>
					<td class='titre_tableau'>Bénéfice</td>";
					foreach($arrAll as $tableau) {
						echo "<td>".$tableau["benefice"]."</td>";
					}		
		echo"</tr></table>";
		$stmt->closeCursor();
		$stmt = NULL;	
	}
	
	function ajouterDB($annee, $salaire, $depense, $mois, $benefice){
		
		$numMois = trierMois($mois);
		$pdo = connection();
		$stmt = $pdo->prepare('SELECT id FROM annee WHERE annee=:annee'); 
		$stmt->bindValue(':annee', $annee, PDO::PARAM_STR);
		$stmt->execute();
		$arrAll = $stmt->fetchAll();
		$an;
		
		if(!empty($arrAll)){
			foreach($arrAll as $arr){
				$an = $arr["id"];
			}
		}
		else{
			$stmt = $pdo->prepare('INSERT INTO annee(annee) VALUES(:annee)');
			$stmt->execute(array(
				':annee' => $annee
			));
			foreach($arrAll as $arr){
				$an = $arr["id"];
			}
		}
		
		$stmt = $pdo->prepare('INSERT INTO resume(idAnnee,numMois,mois,salaire,depense,benefice) VALUES(:idAnnee,:numMois,:mois,:salaire,:depense,:benefice)');
		$stmt->execute(array(
		':idAnnee' => (int)$an,
		':numMois' => (int)$numMois,
		':mois' => $mois,
		':salaire' => $salaire,
		':depense' => $depense,
		':benefice' => $benefice
		));
		
		afficherTableau($an);	//apelle la fonction affichant la base de donnée.sert de reponse pour le flux ajax
		$stmt->closeCursor();
		$stmt = NULL;
		
		
		
	}
	
			//$depense = number_format($depense, 2, ',', ' '); //formate au format monetaire francais avec virgule




onclick='deleteAjax("."\"".$mois."\"".","."\"".$annee."\"".");'



	$stmt = $pdo->prepare('DELETE FROM resume WHERE id=:id AND annee=:annee');
	
	
	
	
	
	
	function afficherAnnee(){	//affiche les annees enregistré dans la bd
		
		$pdo = connection();
		$stmt = $pdo->prepare('SELECT DISTINCT annee FROM resume ORDER BY annee');
		$stmt->execute();
		$arrAll = $stmt->fetchAll();
		if(!empty($arrAll)){
			echo "<h3> Visualisation</h3><div id='selectionAnnee'>Année à afficher <ol name='liste'>";
			
			foreach($arrAll as $tableau){
				echo "<li id=".$tableau["annee"]." onclick='createXHR2((this.id))'>".$tableau["annee"]."</li>";	//this est un objet de type element.on veut l id de cette element
			}
			
			echo "</ol></div>";
		}
		else{
			return null;
		}
		$stmt->closeCursor();
		$stmt = NULL;
	}	




	/*var verif = "coucou";
				chaine='"'+chaine+'"';*/
				
Récupérer des valeurs de champ précis : 
document.forms["formulaire"].elements["copier"].value
window.opener.document.forms["formulaire"].elements["copier"].value
Popup js : 
		var oui = 1;
		var non = 2;
// ouvre une fenetre sans barre d'etat, ni d'ascenceur
				//window.opener.document.getElementById('test').innerHTML=  "Parent window data field";
				w = open("",'popup','width=400,height=200,toolbar=no,scrollbars=no,resizable=yes');	
				w.document.write('<html> <head> ');
				w.document.write("<script src='codeAjax2.js'><\/script><script src='codeAjax.js'><\/script></head> <body>");
				w.document.write("Avez vous finit de copier vos données ?");
				//alert((document.forms["formulaire"].elements["copier"].value));
				w.document.write("<input type='submit' name='Oui' class='bouton' value='Oui' />");
				w.document.write("<input type='submit' name='Non' class='bouton' value='Non' onclick='copierGlobalPopup = copierGlobalPopup+(validation("+non+",copierGlobalPopup)); window.close(); '/>");
				w.document.write("</body></html>");
				w.document.close();


Position curseur js :
//validation(obj)() if(window.confirm() w.document.write("<body> Bonjour "+document.forms["f_popup"].elements["nom"].value+"<br><br>");
					//if(obj.setSelectionRange ){document.setSelectionRange( taille, taille,"none"); met le selectionner au coordonné voulue
					//var range = obj.createTextRange(); 
					//obj.select() selectionner
					/*range.moveEnd('character', taille); recuper post curseur
					range.moveStart('character', taille);}
					var start = document.formulaire.copier.selectionStart ;
					var stop = document.formulaire.copier.selectionEnd ;	*/