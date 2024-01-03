<?php

class Emprunteur{

private $codeBarreEmp;
private $nomemp;
private $prenomemp;
private $telemp;
private $emailemp;

public function __construct($nomemp, $prenomemp, $telemp, $emailemp)
{
    $this->nomemp = $nomemp;
    $this->prenomemp = $prenomemp;
    $this->telemp = $telemp;
    $this->emailemp = $emailemp;

}

public function create(){

    try{
        // Create connection
              include('./dbconnection.php');
              $sql = "INSERT INTO emprunteurs (nomemp, prenomemp, telemp, emailemp) VALUES (?,?,?,?)";
              $stmt = $db->prepare($sql);
      
              $stmt->bindParam(1,$this->nomemp);
              $stmt->bindParam(2,$this->prenomemp);
              $stmt->bindParam(3,$this->telemp);
              $stmt->bindParam(4,$this->emailemp);
              


              $stmt->execute();
      
          if($stmt->rowCount()>0){
              echo 'Emprunteur ajoute avec succes!';
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

public function update($codeBarreEmp,$nouveauNom,$nouveauPrenom,$nouveauTel,$nouvelEmail){
    try {
        include('./dbconnection.php');
        $sql = "UPDATE emprunteurs SET nom = ?, prenom = ?, numero_tel = ?, email = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nouveauNom, $nouveauPrenom, $nouveauTel, $nouvelEmail, $codeBarreEmp]);
        echo "Emprunteur mis à jour avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour de l'emprunteur : " . $e->getMessage();
    }
}

public function afficherDetails()
    {
        echo "ID: {$this->codeBarreEmp}<br>";
        echo "Nom: {$this->nomemp}<br>";
        echo "Prénom: {$this->prenomemp}<br>";
        echo "Téléphone: {$this->telemp}<br>";
        echo "Email: {$this->emailemp}<br>";
    }


}