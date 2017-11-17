function createXHR(copierGlobal1) {
    var copier = copierGlobal1;	//recupere donnees du formulaire et du text area copier
    var annee = document.formulaire.annee.value;
    var mois = document.formulaire.mois.value;
    var rentre = document.formulaire.rentre2.value;
    copierGlobal = "";

    var xhr = null;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {	//Si etape 4 terminé. Serveur renvoie les données en reponse de affichertableau()

            if (xhr.status == 400) {	//si la reponse côté serveur renvoie une erreur
                switch (xhr.statusText) {
                    case 'MONTH_EXIST' : alert("Le mois existe déjà pour cette année");
                }
                
            } else {
   
                //document.getElementById("infoBulle").style.visibility = "visible";
                document.getElementById('afficherTableau').innerHTML = xhr.responseText; //injecte le code html
        
                $(document).ready(function() {
                     $('#infoBulleBox').hide(); 
                     $( "#infoBulleBox" ).slideDown("slow");                 
                });
           
            }
        }
    }

    copier = encodeURIComponent(copier);//encodage pour envoyer les caracteres speciaux & ou autre

    xhr.open("POST", "./Model/calcule.php", true); //ouverture de la connexion en post
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");	//obligatoire pour le post
    xhr.send("copier=" + copier + "&annee=" + annee + "&mois=" + mois + "&rentre=" + rentre);	//envoie des donnees en post

    document.formulaire.copier.value = "";
    document.formulaire.mois.value = "";
    document.formulaire.rentre2.value = "";
    document.forms["formulaire"].elements["oui"].checked = false;

    rentreGlobal = 0;
}

function createXHR2(annee) {

    var xhr = null;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange = function () {
       if((xhr.readyState) != 4) {
             document.getElementById('afficherTableau').innerHTML = "<img src='./images/chargement.gif' />";
        }
        else if(xhr.readyState == 4) {	//Si etape 4 terminé. Serveur renvoie les données en reponse de affichertableau()
            
              document.getElementById('afficherTableau').innerHTML = xhr.responseText;  //injecte le code html renvoyé
              $( "#afficherTableau" ).slideDown("slow"); 	
        }
    }
    xhr.open("POST", "./Model/afficheAnnee.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("annee=" + annee);
}

function confirmation(id, annee) {
    if ((window.confirm("Voulez vous supprimer ce mois ?")) == true) {
        deleteAjax(id, annee);
    }
}

function deleteAjax(id, annee) {

    var xhr = null;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {	//Si etape 4 terminé. Serveur renvoie les données en reponse de affichertableau()
            document.getElementById('afficherTableau').innerHTML = xhr.responseText;	//injecte le code html renvoyé
        }
    }
    xhr.open("POST", "./Model/moisSupp.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id + "&annee=" + annee);
}

