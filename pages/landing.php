<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
    

    // On récupere les données de l'utilisateur
    // $req = $bdd->prepare('SELECT * FROM client WHERE id = ?');
    // $req->execute(array($_SESSION['user']));
    // $data = $req->fetch();
    $mal = $_SESSION['mail'];
    $req = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE email = ?');
    $req->execute(array($mal));

    $res = $req->fetch();




    
    
   

    
   
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="./asset/logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Maison des sports</title>
</head>
<body>
    <header>
        <img src="../assets/logo_camp_sport_plus-300x300.png" alt="" id="wb">
        <h1>Maison des ligues tous les sports</h1>
        <a href="profil.php" class="connex">Profil</a>
        <a href="deconnexion.php" class="connex">Déconnexion</a>
    </header>
    <main>
    <?php  include_once "event_create.php"; ?> 
    <section>
    <h2>Bonjour <?= $res[0] ?> ! Prêt à la compétition?</h2>
    </section>
    <section id="ecriture">
    <p>Tous les mois profitez de toutes les nouveautés et opportunités. A partir du mois prochain on vous propose toutes les séance de sport sur vos support préférés</p>
    </section>  
<section>
    <ul class="grid-picture-large" aria-hidden="true">
    <?php
    
    $request = $bdd->query('SELECT * FROM evenement');

    while ($donnees = $request->fetch()) {
    ?>
                <li data-image="<?php echo htmlspecialchars($donnees['image_evenement']); ?>" data-title="<?php echo htmlspecialchars($donnees['nom_evenement']); ?>"
                    data-description="<?php echo htmlspecialchars($donnees['presentation']); ?>"
                    data-dates="<?php echo htmlspecialchars($donnees['date_modification']); ?>"
                    data-id="<?php echo htmlspecialchars($donnees['id_evenement']); ?>">
                    <figure>
                        <img src="<?php echo htmlspecialchars($donnees['image_evenement']); ?>" alt="<?php echo htmlspecialchars($donnees['nom_evenement']); ?>">
                        <figcaption>
                            <h2>
                                <i class="material-icons" aria-hidden="true">
                                    pages
                                </i>
                                Agrandir

                            </h2>
                        </figcaption>

                    </figure>
                </li>
                <?php
    }

    $request->closeCursor(); // Fin de requète SQL

    ?>

            </ul>  
            </section>    
    </main>
    
   
       <footer class=pied_membre>
       <p>@ - Maison des ligues - 2022</p>
        </footer>    
        <!-- modale -->
    <div class="parent-modale" role="dialog">
      <figure class="modale">
          <button aria-label="closed">
              <span class="material-icons">clear</span>
          </button>
          <img src="https://via.placeholder.com/500" alt="picture">
          <figcaption class="desc">
              <h3>title</h3>
              <p>
                 
              </p>
              <time>Years : </time> <br>
              <form method="POST">
                    <input name="valid" type="submit" value="S'inscrire à l'évenement">
                </form>
            
          </figcaption>
      </figure>
  </div>
  <script src="../js/app.js"></script>
</body>
</html>