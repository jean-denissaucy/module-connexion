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
    <h1>Mon Site</h1>
    
    <nav>
        <ul>
            <li><a href="index.php">🏠 Accueil</a></li>
            <li><a href="/formulaire-inscription/inscription.php">💼 Services</a></li>
            
            <?php if (isset($_SESSION['user'])): ?>
                <li><a href="/adim/admin.php">👤 <?= $_SESSION['user'] ?></a></li>
                <li><a href="/formulaire-de-connexion/connexion.php">🚪 Se déconnecter</a></li>
                
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <li><a href="admin/admin.php">⚙️ Administrateur</a></li>
                <?php endif; ?>
                
            <?php else: ?>
                <li><a href="formulaire-inscription/inscription.php">✍️ S'inscrire</a></li>
                <li><a href="formulaire-de-connexion/connexion.php">🔑 Se connecter</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>

