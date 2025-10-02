<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="style-inscription.css">
</head>
<body>
    <?php
require(__DIR__.'/../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password === $confirm) {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$login, $prenom, $nom, $password]);
        header("Location:/formulaire-de-connexion/connexion.php");
        exit;
    } else {
        $error = "Les mots de passe ne correspondent pas.";
    }
}
?>
<div class="containaire">
<form method="POST">
    Login: <input type="text" name="login" required><br>
    Prénom: <input type="text" name="prenom" required><br>
    Nom: <input type="text" name="nom" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    Confirmer le mot de passe: <input type="password" name="confirm" required><br>
    <input type="submit" value="S'inscrire">
</form>
</div>

<?php if(isset($error)) echo $error; ?>

</body>
</html>