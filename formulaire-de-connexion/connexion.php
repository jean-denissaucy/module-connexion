<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="style-connexion.css">
</head>
<body>
    <h1><center>CONNEXION</center></h1>

<?php
require (__DIR__.'/../db.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $login = $_POST['login'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
    $stmt->execute([$login, $password]);
    $user = $stmt->fetch();

    if ($user){
        $_SESSION['user'] = $user ['login'];
        $_SESSION['role'] = $user['role'];
        header('Location:/index.php');
        exit;
    }else{
        $error = " Login ou mot de passe incorrect.";

    }
}
?>
<form method="POST">
    Login: <input type="text" name="login" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    <input type="submit" value="Se connecter">
</form>

<?php if(isset($error)) echo $error; ?>
</body>
</html>