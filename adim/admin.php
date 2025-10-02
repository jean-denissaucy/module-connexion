<?php
session_start();
require(__DIR__.'/../db.php');

if(!isset($_SESSION['Jeand']) || $_SESSION['role'] !== 'admin'){    
}
$stmt = $pdo->prepare("SELECT * FROM utilisateurs");
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="style-admin.css">
</head>
<body>
    <h1><center> Tableau de bord Administrateur</center></h1>
    <p><center>Bienvenue,<?= $_SESSION['user']?></center></p>
    <p><a href="../index.php">Retour a l'accueil</a></p>
     

<?php if (!empty($user)): ?>
<table>
    <thead>
        <tr>
            <?php foreach (array_keys($user[0]) as $col): ?>
                <th><?php echo htmlspecialchars($col); ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($user as $etu):?>
            <tr>
                <?php foreach($etu as $val):?>
                    <td><?php echo htmlspecialchars($val);?></td>
                <?php endforeach;?>
            </tr>
        <?php endforeach;?>
        
    </tbody>
</table>
<?php else: ?>
    <?php endif; ?>

</body>
</html>