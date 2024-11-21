<?php
require('dataBase.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connection.css">
    <title>Connection</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="titre">
                <div class="connect">
                    Connection
                </div>
            </div>
            <div class="login">
                <form action="" method="POST">
                    <li><input type="email" placeholder="Email" name="email"></li>
                    <li><input type="password" placeholder="Mot de passe" name="password"></li>
                    <li><button type="submit" name="submit">Connect</button></li>
                    <button><a href="../inscription/inscription.php">Inscrire</a></button>
                    <li>
                        <?php
                        if (isset($erreur)) {
                            echo $erreur;
                        }
                        ?>
                    </li>
                </form>
            </div>
        </div>
    </header>
</body>

</html>