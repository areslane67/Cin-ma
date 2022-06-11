<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My History</title>
    <link rel="stylesheet" href="../css/profil.css">
</head>
<?php 
try {
$_pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$_bdd = new PDO('mysql:host=localhost;
                dbname=ap_web', 
                'root', '',
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',$_pdo_options));
      
                // récupération du mail :
                $mal = $_SESSION['mail'];
                $req = $_bdd->prepare('SELECT pseudo FROM utilisateurs WHERE email = ?');
                $req->execute(array($mal));

                $ress = $req->fetch();

        $_mail_user  = $_SESSION['mail'];

        $_response = $_bdd->query("SELECT DISTINCT CL.pseudo, E.image_evenement, E.nom_evenement, E.id_evenement, C.id_client, C.date_consultation 
                                    FROM `utilisateurs` AS CL 
                                    INNER JOIN `consulter` AS C ON (CL.id = C.id_client) 
                                    INNER JOIN `evenement` AS E ON (E.id_evenement = C.id_evenement)
                                    WHERE CL.email = '{$_mail_user}'
                                    ORDER BY C.date_consultation DESC");
        
        // recupération de l'id du client et le sauvegarder dans une variable de session :

        $res = $_bdd->query("SELECT `id` FROM `utilisateurs` WHERE `email` = '{$_mail_user}'");

        $test = $res->fetch();
        $_elf = (int) $test[0];
        

        $_SESSION['id_client'] = $_elf;
        


        $number = $_response->rowCount();
                
               
} catch(PDOException $e) {
    die('Erreur de BDD'.$e->getMessage());
} 
?>
<body>

    <header>
        <section>
        <img src="../assets/logo_camp_sport_plus-300x300.png" alt="" id="wb">
        <h1><code>You have <?= $number ?> events in your history</code></h1>
        <a href="landing.php" class="connex">acceuil</a>
        </section>
        <section>
        <h2>Bonjour <?= $ress[0] ?> ! voici ton historique d'évenement</h2>
        </section>
    </header>

    <main>
<!--itération avec la bdd -->
<section>
<ul>
<?php foreach($_response as $_images):?> 
    <li>
                <figure>
                    <img src="<?= strip_tags($_images['image_evenement']) ?>" alt="<?= strip_tags($_images['nom_evenement']) ?>">
                        <figcaption>
                            <h2><?= strip_tags($_images['nom_evenement']) ?></h2>
                            <a class="delPanier" href="Delete_history.php?id=<?= strip_tags($_images['id_evenement'])?>">Annuler</a>
                        </figcaption>                
                </figure>
</li>
<?php endforeach; ?>
</ul>
</section>
    </main>
    
    <footer>@ - areslane - 2022</footer>


    <script src="../js/app.js"></script>
</body>
</html>