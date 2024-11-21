<?php
session_start();
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $newPassword = $_POST["newPassword"];
    $erreur = " ";
    if (($name && $lastname && $email && $password && $newPassword) == true) {
        if ($password == $newPassword) {
            try {
                $db = new PDO('mysql:host=localhost;dbname=testgateau', 'root', '');
                $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $db->query("INSERT INTO personne VALUES(NULL, '$name', '$lastname', '$email', '$password')");
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('Location: ../header.php?action=cake');
            } catch (Exception $e) {
                // stocké une portion de code html dans une variable
                $erreur = <<<HTML
                    <p style="red" class="erreur">Une erreur est survenue</p>
                HTML;
            }
        } else {
            // stocké une portion de code html dans une variable
            $erreur = "<p style=color:red; class=erreur>Mot de passe incorrect</p>";
        }
    } else {
        $erreur = "<p style=color:red; class=erreur>Veuillez remplir tout les champs</p>";
    }
}
