<?php
require_once '../../index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/inscription.css">
    <title>Inscription</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="titre">
                <div class="SeConnecter">
                    Inscription
                </div>
            </div>
            <div class="login">
                <form action="" method="POST">
                    <li><input type="text" placeholder="Nom" name="name"></li>
                    <li><input type="text" placeholder="Prénom" name="lastname"></li>
                    <li><input type="email" name="email" placeholder="@Email"></li>
                    <li><input type="password" placeholder="Mot de pass" name="password"></li>
                    <li><input type="password" placeholder="Confirmer Mot de pass" name="newPassword"></li>
                    <li><button type="submit" name="sign-up">Inscrire</button></li>
                    <?php 
                    if (isset($userController->erreur)) {
                        echo "<p class=erreur>" . $userController->erreur . "</p>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </header>
</body>

</html>