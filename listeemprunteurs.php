<?php

try {
    include('./dbconnection.php');

    $sql = "SELECT * FROM emprunteurs";
    $stmt = $pdo->query($sql);

    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Numéro de Téléphone</th><th>Email</th></tr>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $row['codeBarreEmp'] . '</td>';
        echo '<td>' . $row['nomemp'] . '</td>';
        echo '<td>' . $row['prenom'] . '</td>';
        echo '<td>' . $row['telemp'] . '</td>';
        echo '<td>' . $row['emailemp'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
