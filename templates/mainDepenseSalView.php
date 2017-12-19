 <table CELLPADDING='9' style="font-size:13px;">
    <tr>
        <td id="total"> <b>Total</b><div id="somme"> <?= $tabSalaireMoyen[0]["total"] ?> euros</div></td>
    
        <td id="total"> <b>Salaire moyen</b> 
            <img id='croix2'  onclick='showSalaire();' src='./images/crayon.ico'/>
            <div id="salMoy">
                  <?= $tabSalaireMoyen[0]["salMoyen"] ?> euros
            </div> 
            <input type='text' id='salMoyen' style="visibility: hidden;" onblur='postSalaire();'/> 
        </td>     
        <td id="total"> <b>Somme restante</b><div id="somme"> <?= $sommeRestante ?> euros</div></td>
    <tr>    
 </table>        
      