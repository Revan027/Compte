<?php
    function addSomme($arrAll){
        
        $sommeTotal = 0;
        
        foreach ($arrAll as $tableau){
          $sommeTotal =  $sommeTotal +$tableau["somme"];
        } 
        $pdo = connection();
        
        $stmt = $pdo->prepare('UPDATE salairemoyen SET total = :sommeTotal');
            $stmt->execute(array(
                ':sommeTotal' => $sommeTotal
            ));
            
        $stmt = $pdo->prepare('SELECT salMoyen,total FROM salairemoyen');
        $stmt->execute();
        $tabSalaireMoyen = $stmt->fetchAll();
        $sommeRestante =  $tabSalaireMoyen[0]["salMoyen"] -  $tabSalaireMoyen[0]["total"];
        
         $stmt = $pdo->prepare('UPDATE salairemoyen SET sommeRestante = :sommeRestante');
            $stmt->execute(array(
                ':sommeRestante' => $sommeRestante
            ));
            
        include __DIR__ .'/../templates/mainDepenseSalView.php';  
        
        $stmt->closeCursor();
        $stmt = NULL;    
    }
    
    function updateSomme(){
        
            
        $pdo = connection();
        $salMoyen = $_POST['salMoyen'];
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM salairemoyen');
        $stmt->execute();
        $tabSalaireMoyen = $stmt->fetchAll();
        
        if($tabSalaireMoyen[0][0]==0){
            $stmt = $pdo->prepare('INSERT INTO salairemoyen(salMoyen) VALUES(:salMoyen)');
            $stmt->execute(array(
                ':salMoyen' => $salMoyen
            ));
        }else{
            $stmt = $pdo->prepare('UPDATE salairemoyen SET salMoyen = :salMoyen');
            $stmt->execute(array(
                ':salMoyen' => $salMoyen
            ));
        }
       
        $stmt = $pdo->prepare('SELECT salMoyen,total FROM salairemoyen');
        $stmt->execute();
        $tabSalaireMoyen = $stmt->fetchAll();
        $sommeRestante =  $tabSalaireMoyen[0]["salMoyen"] -  $tabSalaireMoyen[0]["total"];
        
        $pdo = connection();
        $stmt = $pdo->prepare('SELECT id,libelle,somme FROM mainDepense ORDER BY somme DESC');

        $stmt->execute();
        $tabMainDepense = $stmt->fetchAll();
         
        
        include __DIR__ .'/../templates/mainDepense.php';   
        include __DIR__ .'/../templates/mainDepenseSalView.php';   
        include __DIR__ .'/../templates/mainDepenseView.php';
        
        $stmt->closeCursor();
        $stmt = NULL;  
 
    }
    
    