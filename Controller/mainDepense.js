function postMainDepense(){
    
        var mainDepense = $('#afficherTableau');
        var nameDp  = $('#nameDp').val();
        var somme = $('#somme').val();

        $.ajax({
          
            url : './Model/getMainDepense.php', // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP
            data : 'nameDp=' + nameDp + '&somme=' + somme,
           // Le type de données à recevoir, ici, du HTML.
            success: function (data) {
                // Je charge les données dans box
                mainDepense.html(data);
                $( "#afficherTableau" ).slideDown("slow"); 
            }
        });
        
}