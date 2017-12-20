 <table CELLPADDING='10' style="font-size:13px;">
    <tr>
        <td id="total"> <b>Total</b><div id='barre2'></div><div id="somme"> <?= $tabSalaireMoyen[0]["total"] ?> euros</div></td>
    
        <td id="total"> <b>Salaire moyen</b> <img id='croix'  onclick='showSalaire();' src='./images/crayon.ico' title="Modifier"/><div id='barre2'></div> 
           
            <div id="salMoy">
                  <?= $tabSalaireMoyen[0]["salMoyen"] ?> euros
            </div> 
            <input type='text' id='salMoyen' style="visibility: hidden;" onblur='postSalaire();'/> 
        </td>     
        <td id="total"> <b>Somme restante</b><div id='barre2'></div><div id="somme"> <?= $sommeRestante ?> euros</div></td>
    <tr>    
 </table>        
      