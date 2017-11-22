function postMainDepense(){
    
        var mainDepense = $('#afficherTableau');
        var nameDp  = $('#nameDp').val();
        var sommes = $('#sommes').val();
        
       /* somme = somme.replace(new RegExp(' ', 'g'), '');
        somme = somme.replace(new RegExp(',', 'g'), '.');
        somme = parseFloat(somme);	*/

        $.ajax({
          
            url : './Model/getMainDepense.php', // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP
            data : 'nameDp=' + nameDp + '&sommes=' + sommes,
           // Le type de données à recevoir, ici, du HTML.
            success: function (data) {
                // Je charge les données dans box
                mainDepense.html(data);
            }
        });
        
}

function deleteMainDepense(id){
      var mainDepense = $('#afficherTableau');
        $.ajax({
          
            url : './Model/getMainDepense.php', // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP
            data : 'id=' + id,
           // Le type de données à recevoir, ici, du HTML.
            success: function (data) {
                // Je charge les données dans box
                mainDepense.html(data);
            }
        });
        
}