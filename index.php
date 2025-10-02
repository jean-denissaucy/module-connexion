

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body>
    <h1><center>Bienvenue sur le site</center></h1>
<nav>
    <h1> Mon Site</h1>
    <ul>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="adim/admin.php">👤 <?= $_SESSION['user'] ?></a></li>
            <a href="formulaire-inscription/inscription.php">Se déconnecter</a></li>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <li><a href="formulaire-de-connexion/connexion.php">Administrateur</a></li>
            <?php endif; ?>
        <?php else: ?>
            <li><a href="formulaire-inscription/inscription.php">S'inscrire</a></li>
            <li><a href="formulaire-de-connexion/connexion.php">Se connecter</a></li>
        <?php endif; ?>
    </ul>
</nav>