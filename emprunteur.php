
<?php
include('./menu.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire Emprunteur</title>
</head>
<body>
    <div class="container">
        <h2>Formulaire Emprunteur</h2>
        <form action="" method="post" >
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="tel">Numéro de Téléphone :</label>
            <input type="tel" id="tel" name="tel" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <input type="submit" value="Enregistrer">
        </form>
    </div>
</body>
</html>
