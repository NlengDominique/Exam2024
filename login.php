<?php
include('./dbconnection.php');
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier les informations d'identification (remplacez ceci par votre propre logique d'authentification)
    $login_valide = "luqnleng5@gmail.com";
    $password_valide = "1234";

    $login = $_POST["login"];
    $password = $_POST["password"];

    if ($login == $login_valide && $password == $password_valide) {
        // Authentification réussie, rediriger vers la page d'accueil
        $_SESSION["user"] = $login;
        header("Location: page.php");
        exit();
    } else {
        // Authentification échouée, afficher un message d'erreur
        $error_message = "Login ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
    <?php if (isset($error_message)) : ?>
    <p style="color: red;"><?php echo $error_message; ?></p>
<?php endif; ?>
<form action="login.php" method="post">
    <label for="login">Login:</label>
    <input type="text" name="login" required>

    <label for="password">Mot de passe:</label>
    <input type="password" name="mdp" required>

    <button type="submit">Se connecter</button>
</form>
    </div>
</body>
</html>
