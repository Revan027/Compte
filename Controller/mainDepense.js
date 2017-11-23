function postMainDepense(){
    
       /* somme = somme.replace(new RegExp(' ', 'g'), '');
        somme = somme.replace(new RegExp(',', 'g'), '.');
        somme = parseFloat(somme);	*/

        $.ajax({
          
            url : './Model/getMainDepense.php', // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP
            data: {
                nameDp: $('#nameDp').val(),
                sommes: $('#sommes').val()
            },
           // Le type de données à recevoir, ici, du HTML.
            success: function (data) {
                // Je charge les données dans box
                $('#afficherTableau').html(data);
            }
        });
        
}

function deleteMainDepense(id){
        $.ajax({
          
            url : './Model/getMainDepense.php', // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP
            data : {
                id: id
            },
           // Le type de données à recevoir, ici, du HTML.
            success: function (data) {
                // Je charge les données dans box
                $('#afficherTableau').html(data);
            }
        });
        
}