<?php include './getDB.php';
    if(isset($_POST['nameDp']) && isset($_POST['somme'])){
       
        
        $pdo = connection();
        $nameDp = $_POST['nameDp'];
        $somme = $_POST['somme'];

        $stmt = $pdo->prepare('INSERT INTO mainDepense(libelle,somme) VALUES(:nameDp,:somme)');
        $stmt->execute(array(
            ':nameDp' => $nameDp,
            ':somme' => $somme
        ));
        
        $stmt = $pdo->prepare('SELECT libelle,somme FROM mainDepense ');

        $stmt->execute();
        $arrAll = $stmt->fetchAll();

        include __DIR__ .'/../templates/mainDepense.php';
        include __DIR__ .'/../templates/mainDepenseView.php';
      

        $stmt->closeCursor();
        $stmt = NULL;
}
else{
    $pdo = connection();
        $stmt = $pdo->prepare('SELECT libelle,somme FROM mainDepense ');

        $stmt->execute();
        $arrAll = $stmt->fetchAll();

        include __DIR__ .'/../templates/mainDepense.php';
         include __DIR__ .'/../templates/mainDepenseView.php';
         
        $stmt->closeCursor();
        $stmt = NULL;      
        
}
  
 