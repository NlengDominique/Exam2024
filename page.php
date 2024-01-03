<!-- welcome_content.php -->
<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de login
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>

<h2>Bienvenue, <?php echo $_SESSION["user"]; ?>!</h2>
<p>Vous êtes maintenant connecté.</p>

</body>
</html>
