<?php
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email && $password) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=testgateau', 'root', '');
            $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //les noms de champs seront en caracteres minuscules
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $SltEmail = $db->query("SELECT id FROM personne WHERE email = '$email'");
            $SltPassWord = $db->query("SELECT id FROM personne WHERE password = '$password'");
            // $id = $db->query("SELECT Prenom FROM personne WHERE Email = '$email' AND PassWord = '$password'");

            if ($SltEmail->fetchColumn() && $SltPassWord->fetchColumn()) {
                $identiter = $db->query("SELECT * FROM personne WHERE email = '$email' AND password = '$password'");
                $compte = $identiter->fetch(PDO::FETCH_OBJ);
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $compte->id;
                header("Location: ../header.php?action=patisserie");
            } else {
                // stocké une portion de code html dans une variable
                $erreur = <<<HTML
                    <p style="color:red;" class="erreur">Mauvais identifiant</p>
                HTML;
            }
        } catch (Exception $e) {
            $erreur = <<<HTML
                <p style="color:red;" class="erreur">Une erreur est survenue</p>
            HTML;
        }
    } else {
        $erreur = <<<HTML
                <p style="color:red;" class="erreur">Veuillez remplir tous les champs</p>
            HTML;
    }
}
