<html><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <head>
        <link rel="stylesheet"  href="./feuille.css"/>
        <script type="text/javascript" src="codeAjax.js" ></script>
    </head>
    <body onload='raz();'> 
        <script type="text/javascript">
            var rentreGlobal = 0.0;
            var copierGlobal = "";

            createXHR2(2017);

            function raz() {
                document.formulaire.rentre2.value = "";
                rentreGlobal = 0;
                copierGlobal = "";
                document.forms["formulaire"].elements["oui"].checked = false;
            }

            function effacer() {
                if (document.formulaire.copier.value == "Copiez Coller vos données (si sur plusieurs page 'envoyez les données' a chaque page) du 28 au 28 de chaque mois par exemple") {	//chemin pour acceder au parametre valeur
                    document.formulaire.copier.value = "";
                }
            }

            function reecrire() {
                if (document.formulaire.copier.value == "") {
                    document.formulaire.copier.value = "Copiez Coller vos données (si sur plusieurs page 'envoyez les données' a chaque page) du 28 au 28 de chaque mois par exemple";
                }
            }

            function bloquer(evenement) {	//on passe l'evenement qui se produit. Cela permet au développeur d'accéder à plus d'informations (par exemple : l'objet qui a reçu l'événement, le type de l'événement et le bouton de la souris utilisé
                if (evenement.keyCode == 13) {
                    evenement.returnValue = true;
                } else {
                    evenement.returnValue = false;	//recuperer si evenement declencher dans l'evenement onkeypress rowspan	
                }
            }

            function ajoutCopierGlobal() {
                if (document.forms["formulaire"].elements["oui"].checked === true) {
                    copierGlobal = copierGlobal + (document.forms["formulaire"].elements["copier"].value);
                    alert("Données enregistées");
                    createXHR(copierGlobal);
                } else {
                    copierGlobal = copierGlobal + (document.forms["formulaire"].elements["copier"].value);
                    alert("Données enregistées");
                    document.forms["formulaire"].elements["copier"].value = "";
                }
            }

            function ajout(evenement) {
                if (evenement.keyCode == 13) {
                    var rentre = (document.formulaire.rentre.value);
                    rentre = rentre.replace(new RegExp(' ', 'g'), '');	//Remplace les espaces et les virgules, pour le format numériques pour les calculs
                    rentre = rentre.replace(new RegExp(',', 'g'), '.');
                    rentre = parseFloat(rentre);	//Convertit en floatant

                    rentreGlobal = rentre + rentreGlobal;

                    document.formulaire.rentre.value = '';
                    document.formulaire.rentre2.value = rentreGlobal;
                }
            }

        </script>
        <div id="top">
            <img class="titre" src="images\titre.png"/>
        </div>	
        <div id="mainConteneur">	

            <div id="barreG"></div>	

            <div id="barreD"></div>	

            <div id="centre">

                <div id="afficherTableau"></div>

                <form name='formulaire'>
                    <div id="barre"></div>
                    <h3> Entrez vos informations à enregister</h3>

                    <fieldset>
                        Année :
                        <SELECT name="annee" size="1">
                            <OPTION>2017
                            <OPTION>2016
                            <OPTION>2018
                        </SELECT><br/>				

                        Mois :
                        <SELECT name="mois" size="1">
                            <OPTION>Janvier	
                            <OPTION>Février
                            <OPTION>Mars
                            <OPTION>Avril
                            <OPTION>Mai
                            <OPTION>Juin
                            <OPTION>Juillet
                            <OPTION>Aout
                            <OPTION>Septembre
                            <OPTION>Octobre
                            <OPTION>Novembre
                            <OPTION>Décembre
                        </SELECT><br/>
                    </fieldset>

                    <fieldset>
                        <legend>Appuyez sur Entrée pour ajouter chaque rentrée d'argent</legend>
                        Rentrée d'argent : <input type='text' name='rentre' onkeypress="ajout(event)" maxlength="8"/><input type='text' name='rentre2' disabled /><br/>
                    </fieldset>

                    <div id="blocCopier">

                        <textarea name='copier' onBlur="reecrire()" onkeypress="bloquer(event)" onclick="effacer();" >Copiez Coller vos données (si sur plusieurs page 'envoyez les données' a chaque page) du 28 au 28 de chaque mois par exemple</textarea>

                        <div id="fieldsetBlocCopier">

                            <fieldset>
                                <legend>Avez vous finit de copier vos données ?</legend>
                                <input type="checkbox" id="oui" name="oui" value="oui">
                                <label for="coding">Oui</label>				  
                            </fieldset>

                            <input type='button' name='calculer' class="bouton" value="Envoyez les données" onclick='ajoutCopierGlobal();'/>
                            <input type='reset' name='reset' class="bouton" value="Effacer les données" onclick='raz();' /><br/>	
                        </div>		
                    </div>
                </form>
            </div>
        </div>	
        <div id="footer">
            <p class="signature">Développée  par Freyss M</p><p class="version">Gestion Comptes . Version 1.2</p>
        </div>	
    </body>
</html>
