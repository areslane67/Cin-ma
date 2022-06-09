<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/formulaire.css">
    <title>Formulaire</title>
</head>
<body>
    <header>
        <img src="../assets/logo_camp_sport_plus-300x300.png" alt="" id="wb">
        <h1>Maison des ligues tous les sports</h1>
    </header>
    <main>
    <section>
        <ul class="grid-picture-large">
            <li 
            data-image="../assets/1.jpg" 
            data-title="la belle et la bete" 
            data-description="c'est un film épatant, entre action et émotion..." 
            data-dates="02/01/2020">
                <figure>
                    <img src="../assets/1.jpg" alt="" class="ok">
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
            <li 
            data-image="../assets/8.jpg" 
            data-title="Rampage" 
            data-description="c'est un film épatant, entre action et émotion..." 
            data-dates="02/01/2020">
                <figure>
                    <img src="../assets/8.jpg" alt="">
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
            <li 
            data-image="../assets/9.jpg" 
            data-title="Avengers" 
            data-description="c'est un film épatant, entre action et émotion..." 
            data-dates="02/01/2020">
                <figure>
                    <img src="../assets/9.jpg" alt="">
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
            <li 
            data-image="../assets/4.webp" 
            data-title="A whisker away" 
            data-description="c'est un film épatant, entre action et émotion..." 
            data-dates="02/01/2020">
                <figure>
                    <img src="../assets/4.webp" alt="">
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
            <li 
            data-image="../assets/14.jpg" 
            data-title="IT" 
            data-description="c'est un film épatant, entre action et émotion..." 
            data-dates="02/01/2020">
                <figure>
                    <img src="../assets/14.jpg" alt="">
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
        </ul>
    </section>
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
                <time>Years : </time>
            </figcaption>
        </figure>
    </div>
    <h2>Remplissez le formulaire</h2>
    <div class="login-form">
        <?php 
            if(isset($_GET['reg_err']))
            {
                $err = htmlspecialchars($_GET['reg_err']);

                switch($err)
                {
                    case 'success':
                    ?>
                        <figure class="success">
                            <strong>Succès</strong> Inscription réussie !
                        </figure>
                    <?php
                    break;

                    case 'password':
                    ?>
                        <figure class="error">
                            <strong>Erreur</strong> Mot de passe différent.
                        </figure>
                    <?php
                    break;

                    case 'emailz':
                    ?>
                        <figure class="error">
                            <strong>Erreur</strong> Email non valide.
                        </figure>
                    <?php
                    break;

                    case 'email_length':
                    ?>
                        <figure class="error">
                            <strong>Erreur</strong> Email trop long.
                        </figure>
                    <?php 
                    break;

                    case 'pseudo_length':
                    ?>
                        <figure class="error">
                            <strong>Erreur</strong> Nom trop long.
                        </difigurev>
                    <?php 
                    case 'already':
                    ?>
                        <figure class="error">
                            <strong>Erreur</strong> Compte déjà existant.
                        </figure>
                    <?php 

                }
            }
            ?>
        
        <form action="inscription_traitement.php" method="post">
            <h2 class="text-center">Inscription</h2>       
            <div class="form-group">
                <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Inscription</button>
            </div>   
        </form>
        <p class="text-center"><a href="index.php">Connexion</a></p>
    </div>
</main>
    <footer>@ - areslane - 2022</footer>
    <script src="../js/app.js"></script>
</body>
</html>