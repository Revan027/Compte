
function changeView(page){
   
    $( "#afficherTableau" ).slideUp("slow"); 
    setTimeout(function(){ 
         viewMainChange(page);  
     }, 1000);   
}

function viewMainChange(page){
    
    if(page===1){
        createXHR2(2017);
    }else{
        $.ajax({

           url : './Model/getMainDepense.php', // La ressource ciblée
           type : 'GET', // Le type de la requête HTTP
           dataType : 'html', // Le type de données à recevoir, ici, du HTML.
           success: function (data) {
                // Je charge les données dans box
                $('#afficherTableau').html(data);
                $( "#afficherTableau" ).slideDown("slow"); 
            }
        });
        
  
    }    
}