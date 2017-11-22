<?php include './getDB.php';
    if(isset($_POST['nameDp']) && isset($_POST['sommes'])){
            
        $pdo = connection();
        $nameDp = $_POST['nameDp'];
        $sommes = $_POST['sommes'];

        $stmt = $pdo->prepare('INSERT INTO mainDepense(libelle,somme) VALUES(:nameDp,:somme)');
        $stmt->execute(array(
            ':nameDp' => $nameDp,
            ':somme' => $sommes
        ));
        
        $stmt = $pdo->prepare('SELECT id,libelle,somme FROM mainDepense ORDER BY somme DESC');

        $stmt->execute();
        $arrAll = $stmt->fetchAll();

        include __DIR__ .'/../templates/mainDepense.php';
        include __DIR__ .'/../templates/mainDepenseView.php';
      

        $stmt->closeCursor();
        $stmt = NULL;
}
else if(isset($_POST['id'])){
    
        $id = $_POST['id'] ; 
        
        $pdo = connection();
        $stmt = $pdo->prepare('DELETE FROM mainDepense WHERE id=:id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute(); 
        $stmt->closeCursor();   
   
        $stmt = $pdo->prepare('SELECT id,libelle,somme FROM mainDepense ORDER BY somme DESC');

        $stmt->execute();
        $arrAll = $stmt->fetchAll();

        include __DIR__ .'/../templates/mainDepense.php';
        include __DIR__ .'/../templates/mainDepenseView.php';
         
        $stmt->closeCursor();
        $stmt = NULL;    
        
}else{
    
        $pdo = connection();
        $stmt = $pdo->prepare('SELECT id,libelle,somme FROM mainDepense ORDER BY somme DESC');

        $stmt->execute();
        $arrAll = $stmt->fetchAll();

        include __DIR__ .'/../templates/mainDepense.php';
        include __DIR__ .'/../templates/mainDepenseView.php';
         
        $stmt->closeCursor();
        $stmt = NULL;      
    
}
  
 