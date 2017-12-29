var clique = 1;
var stop = 0;

function slideAr(taille){
    var v = "#lib0".concat(clique.toString());
    var v2 = "#lib1".concat(clique.toString());
    var v3 = "#lib2".concat(clique.toString());
    var v4 = "#lib3".concat(clique.toString()); 
   
    
    if((taille>6) && ((taille-clique) >= 6)){
        $(function(){
           
            $(v).animate({marginLeft:-125},200,function(){
                 $(v).hide();
                
            }); 
              
             $(v2).animate({marginLeft:-125},200,function(){
                 $(v2).hide();
                
            }); 
            
            $(v3).animate({marginLeft:-125},200,function(){
                 $(v3).hide();
                
            }); 
            
             $(v4).animate({marginLeft:-125},200,function(){
                 $(v4).hide();
                
            }); 
            clique=clique+1;
         });
    
}  
}

function slideAv(){

    if(clique !== 1){
        
        clique=clique-1;
        
        var v = "#lib0".concat(clique.toString());
        var v2 = "#lib1".concat(clique.toString());
        var v3 = "#lib2".concat(clique.toString());      
        var v4 = "#lib3".concat(clique.toString());  
        
              $(function(){
                $(v).show();    
                $(v).animate({marginLeft:0},200);
                  $(v2).show();    
                $(v2).animate({marginLeft:0},200);
                $(v3).show();    
                $(v3).animate({marginLeft:0},200);
                 $(v4).show();    
                $(v4).animate({marginLeft:0},200);

             });
             
     } 
    
   
    
}

  // $('#lib2').prop('id', 'lib1'); changer id juery