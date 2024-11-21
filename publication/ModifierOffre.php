<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Document</title>
</head>

<body>



    <?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=testgateau', 'root', '');
        $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('une erreur est survenue');
    }
    session_start();

    if (isset($_SESSION['email']) && isset($_SESSION['id'])) {
        $idPersonne = $_SESSION['id'];
        $select = $db->query("SELECT * FROM produit WHERE idPersonne = '$idPersonne'");
        while ($s = $select->fetch(PDO::FETCH_OBJ)) {
    ?>
            <div class="produit">
                <div class="img">
                    <img src="../imgs/<?php echo $s->nom; ?>">
                </div>
                <div class="contenue">
                    <div class="propos">
                        <ul>
                            <li class="li"><?php echo $s->prix; ?></li>
                            <li><?php echo $s->nom; ?></li>
                            <li>Multigram</li>
                        </ul>
                    </div>
                    <div class="add">
                        <ul>
                            <li>
                                <p><?php echo $s->poid; ?></p>
                            </li>
                            <li><a href="modifier.php?id=<?php echo $s->id ?>">Modifier</a></li>
                            <li><a href="ModifierOffre.php?action=supprimer&id=<?php echo $s->id ?>">Supprimer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <p>kjhfl</p>
    <?php
        if (isset($_GET['action']) && $_GET['action'] == 'supprimer') {
            $idDEl = $_GET['id'];
            $del = $db->query("DELETE FROM produit WHERE id='$idDEl'");
        }
    } else {
        echo "Veuillez vous connectez";
    }

    ?>
</body>

</html>