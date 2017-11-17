<html><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <head>
        <link rel="stylesheet"  href="./feuille.css"/>
        
        <script src="./jquery-3.2.1.js"></script>
        <script type="text/javascript" src="./Controller/codeAjax.js" > </script> 
         <script type="text/javascript" src="./Controller/changeView.js" > </script> 
        <script type="text/javascript" src="./Controller/verification.js" ></script>
     

    </head>

    <body onload='raz();'> 

        <div id="top">
            <img class="titre" src="images\titre.png"/>
        </div>	
        <div id="mainConteneur">	

            <div id="barreG"></div>	

            <div id="barreD"></div>	

            <div id="centre">
                
                <h3><a onclick="changeView(1);">Tableau de compte</a> / <a onclick="changeView(2);">Autre</a></h3>
                
                <div id="afficherTableau" ></div>
 
                <form name='formulaire'>
                 
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
                        <legend>Cliquez sur l'icône 'plus' pour ajouter chaque rentrée d'argent</legend>
                        Rentrée d'argent : <input type='text' name='rentre' maxlength="8"/><img id="imgAdd" src="./images/addition.png" onClick="ajout(event);"><input type='text' name='rentre2' disabled /><br/>
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
            <p class="signature">Développée  par Freyss M</p><p class="version">Gestion Comptes . Version 1.6</p>
        </div>	
    </body>
</html>
