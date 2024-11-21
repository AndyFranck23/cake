<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=testgateau', 'root', '');
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('une erreur est survenue');
}
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="tete">
            <div class="nav">
                <div class="bar">
                    <a><i class="fa fa-bars"></i></a>
                </div>
                <div class="logo">
                    DES GÄTEAUX ET DU PAIN
                </div>
                <ul>
                    <li><a href="?action=patisserie" class="<?php if ($_GET['action'] == 'patisserie') {
                                                                echo 'patisserie';
                                                            } else {
                                                                echo '';
                                                            } ?>">PÂTISSERIE</a></li>
                    <li><a href="?action=pain" class="<?php if ($_GET['action'] == 'pain') {
                                                            echo 'patisserie';
                                                        } else {
                                                            echo '';
                                                        } ?>">PAINS</a></li>
                    <li><a href="?action=cake" class="<?php if ($_GET['action'] == 'cake') {
                                                            echo 'patisserie';
                                                        } else {
                                                            echo '';
                                                        } ?>">CAKES</a></li>
                    <li><a href="?action=viennoiserie" class="<?php if ($_GET['action'] == 'viennoiserie') {
                                                                    echo 'patisserie';
                                                                } else {
                                                                    echo '';
                                                                } ?>">VIENNOISERIES</a></li>
                </ul>
                <div class="icon">
                    <a href="publication/boutique.php">
                        <i class="fa fa-shopping-cart">
                        </i>
                    </a>
                    <a href="#"><i class="fa-circle"></i></a>
                </div>
            </div>
        </div><br>
        <div class="tena">
            <div class="zavatra" style="<?php if ($_GET['action'] == 'patisserie') {
                                            echo 'background-image: url(image/bread-border-wood-background-copy-space-whole-grain-loaves-spikelets-different-types-bakery-vertical-composition-184929806.jpg)';
                                        } else if ($_GET['action'] == 'pain') {
                                            echo 'background-image: url(image/contenu/_117644323_262c7b8f-a2d1-49ed-83af-2518a27760d7.jpg)';
                                        } else if ($_GET['action'] == 'cake') {
                                            echo 'background-image: url(image/contenu/670508.jpg)';
                                        } else if ($_GET['action'] == 'viennoiserie') {
                                            echo 'background-image: url(image/contenu/titre.jpg)';
                                        }
                                        ?>">
                <div class="objet">
                    <ul>
                        <li><a id="p" href="?action=patisserie" class="<?php if ($_GET['action'] == 'patisserie') {
                                                                            echo 'patisserie';
                                                                        } else {
                                                                            echo '';
                                                                        } ?>">PÂTISSERIE</a></li>
                        <li><a id="p" href="?action=pain" class="<?php if ($_GET['action'] == 'pain') {
                                                                        echo 'patisserie';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>">PAINS</a></li>
                        <li><a id="p" href="?action=cake" class="<?php if ($_GET['action'] == 'cake') {
                                                                        echo 'patisserie';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>">CAKES</a></li>
                        <li><a href="?action=viennoiserie" class="<?php if ($_GET['action'] == 'viennoiserie') {
                                                                        echo 'patisserie';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>">VIENNOISERIES</a></li>
                    </ul>
                </div>
                <div class="soratra">
                    <h5 class="titre">Country<br>Sourdough <br>$5.00</h5><br>
                    <h2>TRADITIONAL <br> ARTISAN BAKERY</h2>
                    <p>
                        Little Red Hen is dedicated to producing breads using traditional baking techniques
                        handmade bread, <br> granola, cookies and more with simple, high quality ingredients. All baked
                        locally in our woodfired brick oven.
                    </p>
                    <a href="#" class="shop">Shop Now</a>
                    <p><i class="fa"></i>Slamon Arm, <br>British columbia</p>
                </div>
            </div>
        </div>
    </header>
    <h1 class="style">Bonne âppetit</h1>
    <h1>PÂTISSERIE</br></h1>
    <p class="recette">
        Principalement basée sur des fruits de qualité exceptionnelle essentiellement biologiques (pour
        en savoir plus, cliquer sur l’onglet ingrédients), ma pâtisserie est une pâtisserie gourmande, dictée par le
        goût.
        Je travaille avec des petits producteurs français impliqués partageant mes valeurs : qualité et respect de
        l'environnement. <br>
        Oeufs de plein air biologiques d’origine française, amandes de Provence, fruits, farine française biologique,
        beurre extra frais, sel de Noirmoutier… nos produits sont fabriqués à la main, au sein de notre atelier et dans
        le respect de la saisonnalité, sans additifs ni colorants.

    </p>

    <div class="corps">
        <?php
        if ($_GET['action'] == 'patisserie') {
            $select = $db->query("SELECT * FROM produit WHERE Categorie='patisserie'");
        } else if ($_GET['action'] == 'pain') {
            $select = $db->query("SELECT * FROM produit WHERE Categorie='pain'");
        } else if ($_GET['action'] == 'cake') {
            $select = $db->query("SELECT * FROM produit WHERE Categorie='cake'");
        } else if ($_GET['action'] == 'viennoiserie') {
            $select = $db->query("SELECT * FROM produit WHERE Categorie='viennoiserie'");
        }
        while ($s = $select->fetch(PDO::FETCH_OBJ)) {
        ?>
            <div class="produit">
                <div class="img">
                    <img src="imgs/<?php echo $s->nom; ?>">
                </div>
                <div class="contenue">
                    <div class="propos">
                        <ul>
                            <li class="li"><?php echo "zavatra = " . $select->fetchColumn(); ?></li>
                            <li><?php echo $s->nom; ?></li>
                            <li>Multigram</li>
                        </ul>
                    </div>
                    <div class="add">
                        <ul>
                            <li>
                                <p><?php echo $s->poid; ?></p>
                            </li>
                            <li><a href="#">ADD</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


    </div>
</body>
<footer>
    <div class="foot">
        <p>Copyright 2023 Andy Franck - Toute reproduction interdite</p>
    </div>
</footer>
<script src="script/jquery2.js"></script>
<script src="script/jquery.js"></script>

</html>