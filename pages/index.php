<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>
            <link rel="stylesheet" href="../css/login.css">

            <title>Connexion</title>
        </head>
        <body>
        
        <div class="login-form">
        <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <figure class="error">
                                <strong>Erreur</strong> mot de passe incorrect
                            </figure>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <figure class="error">
                                <strong>Erreur</strong> email incorrect
                            </figure>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <figure class="error">
                                <strong>Erreur</strong> compte non existant
                            </figure>
                        <?php
                        break;
                    }
                }
                ?> 
            
            <form action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <p class="text-center"><a href="inscription.php">Inscription</a></p>
        </div>
        
        </body>
</html>