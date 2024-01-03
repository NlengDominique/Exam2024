<?php 
class Emprunteur{

private $numrayon;
private $section;
private $numetagere;

public function __construct($section, $numetagere)
{
    $this->section = $section;
    $this->numetagere = $numetagere;
}

public function create(){

    try{
        // Create connection
              include('./dbconnection.php');
              $sql = "INSERT INTO rayons (section, numetagere) VALUES (?,?)";
              $stmt = $db->prepare($sql);
      
              $stmt->bindParam(1,$this->section);
              $stmt->bindParam(2,$this->numetagere);

              $stmt->execute();
      
          if($stmt->rowCount()>0){
              echo 'Rayon ajoute avec succes!';
          }
          else{
              echo 'Erreur!';
          }
              }
              catch(PDOException $e){
                  echo 'Erreur de connexion a la base !' .$e->getMessage();
              }
              finally{
                  $db = null;
              }
}

public function update($numrayon,$nouvelsection,$nouveaunumetagere){
    try {
        include('./dbconnection.php');
        $sql = "UPDATE rayons SET section = ?, numetagere = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nouvelsection, $nouveaunumetagere, $numrayon]);
        echo "Rayon mis à jour avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour du rayon : " . $e->getMessage();
    }
}

public function afficherDetails()
    {
        echo "ID: {$this->numrayon}<br>";
        echo "Section: {$this->section}<br>";
        echo "Numero: {$this->numetagere}<br>";
        
    }


}

?>