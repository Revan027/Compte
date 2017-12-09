<?php if (!isset($_SESSION['login']) && !isset($_SESSION['mdp'])) {  ?>
<html>
   <head>
        <link rel="stylesheet"  href="./feuille.css"/>
        <link rel="icon" type="image/png" href="./images/changeView1.png" />   
    </head>
    
    <body>
        <div id="top">
            <img class="titre" src="images\titre.png"/>
        </div>	
    <form action="./Controller/login.php" method="post" autocomplete="off">
        
        <fieldset id="fieldset">
            <legend>Identification</legend>
             Votre login : <input type="text" name="login"  />
            <br /><br />
            Votre mot de passe : <input type="password" name="mdp"/><br /><br />
            <input type="submit" class="bouton" value="Connexion">
         </fieldset>
    </form>
        
    <div id="footer">
        <p class="signature">Développée  par Freyss M</p><p class="version">Gestion Comptes . Version 1.8</p>
    </div>	
    </body>
</html>
<?php }