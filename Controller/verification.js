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
        copierGlobal = copierGlobal + (document.forms["formulaire"].elements["copier"].value)+ " ";
        alert(copierGlobal);
        createXHR(copierGlobal);
    } else {
        copierGlobal = copierGlobal + (document.forms["formulaire"].elements["copier"].value)+ " ";
        alert(copierGlobal);
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
