<html><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<head><link rel="stylesheet"  href="./feuille.css"/></head>
	<body>  
		<script type="text/javascript">
			function effacer(){
				if(document.formulaire.copier.value=="Copier Coller vos données"){	//chemin pour acceder au parametre valeur
					document.formulaire.copier.value="";
				}	
			}
			function reecrire(){
				if(document.formulaire.copier.value==""){
					document.formulaire.copier.value="Copier Coller vos données";
				}
			}
			function bloquer(evenement){	//on passe l'evenement qui se produit. Cela permet au développeur d'accéder à plus d'informations (par exemple : l'objet qui a reçu l'événement, le type de l'événement et le bouton de la souris utilisé
				if(evenement.keyCode==13){	
					evenement.returnValue=true;
				}
				else{
					evenement.returnValue=false;	//recuperer si evenement declencher dans l'evenement onkeypress rowspan	
				} 
						
			}		
		</script>
		<script src="codeAjax.js" type="text/javascript"></script>
		<table><caption>Dépense/Salaire</caption>
			<tr>
				<td rowspan="3" class="titre_tableau">Annee</td>
				<td class="titre_tableau"> Mois</td>
				<td>janvier</td>
				<td>janvier</td>
				<td>janvier</td>
			</tr>
			<tr>
				<td class="titre_tableau">Salaire</td>
				<td>2000</td>
				<td>2500</td>
				<td>2500</td>
			</tr>
			<tr>
				<td class="titre_tableau">Dépense</td>
				<td>1500</td>
				<td>1400</td>
				<td>1100</td>
			</tr></tbody>
		</table>
		<form name='formulaire' method='post' action='./calcule.php'>
				<input type='text' name='mois_en_cours' value='Mois en cours' disabled /><br/>
				<input type='text' name='mois_en_cours' value='Salaire du mois' disabled /><br/>
				<textarea name='copier' onBlur="reecrire()" onclick="effacer()" onkeypress="bloquer(event)" >Copier Coller vos données</textarea><br/>	
				<input type='submit' name='calculer' class="bouton" /><br/>
				<input type='reset' name='reset' class="bouton" value="Reset" /><br/>
				<input type='text' name='afficher' disabled /><br/>
		</form>
	</body>
</html>
