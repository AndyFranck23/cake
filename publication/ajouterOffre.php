<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=testgateau', 'root', '');
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('une erreur est survenue');
}
session_start();

if (isset($_SESSION['email'])) {
    // if (isset($_GET['action'])) {
    // if ($_GET['action'] == 'ajouter') {
?>
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>Nom de l'offre :</h2><input type="text" name="offre"><br>
        <h2>Poids : </h2><input type="text" name="poids"><br>
        <h2>Prix : </h2><input type="number" name="prix"><br><br>
        <input type="file" name="img"><br><br>
        <h2>Categorie : </h2>
        <select name="categorie">
            <option>patisserie</option>
            <option>pain</option>
            <option>cake</option>
            <option>viennoiserie</option>
            <option>autre</option>
        </select>
        <input type="submit" name="submit"><br>
    </form>
<?php
    if (isset($_POST['submit'])) {
        $offre = $_POST['offre'];
        $poids = $_POST['poids'];
        $prix = $_POST['prix'];
        $categorie = $_POST['categorie'];

        // debut du protocole image
        $img = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
        if (!empty($img_tmp)) {
            $image = explode('.', $img);
            $image_ext = end($image);
            if (in_array(strtolower($image_ext), array('png', 'jpg', 'jpeg')) === false) {
                echo 'veuillez entrer une image png, jpg, jpeg';
            } else {
                $image_size = getimagesize($img_tmp);
                if ($image_size['mime'] == 'image/jpeg') {
                    $image_src = imagecreatefromjpeg($img_tmp);
                } else if ($image_size['mime'] == 'image/png') {
                    $image_src = imagecreatefrompng($img_tmp);
                } else {
                    $image_src = false;
                    echo 'veuillez entrer une image valide';
                }
                if ($image_src !== false) {
                    $image_width = 400;
                    if ($image_size[0] == $image_width) {
                        $image_finale = $image_src;
                    } else {
                        $new_width[0] = $image_width;
                        $new_height[1] = 200;
                        $image_finale = imagecreatetruecolor($new_width[0], $new_height[1]);
                        imagecopyresampled($image_finale, $image_src, 0, 0, 0, 0, $new_width[0], $new_height[1], $image_size[0], $image_size[1]);
                    }
                    imagejpeg($image_finale, '../imgs/' . $offre . '.jpg');
                }
            }
        } else {
            echo 'veuillez entrer une image';
        }
        // fin du protocole image

        if ($offre && $poids && $prix && $categorie) {
            $id = $_SESSION['id'];
            // $insert = $db->query("TRUNCATE TABLE produit");  // supprime tous les données de la table et commence par 1
            // $insert = $db->query("DELETE FROM produit WHERE id='5'"); //supprime une données d'une table et continue a s'incrimenter
            $insert = $db->query("INSERT INTO produit VALUES(NULL, '$id', '$offre', '$poids', '$prix', '$categorie')");
        } else {
            echo 'veuillez remplir tous les champs';
        }
    }
    // } else if ($_GET['action'] == 'modifer') {
    // }
    // }
} else {
    echo 'veuillez vous connecter';
}
