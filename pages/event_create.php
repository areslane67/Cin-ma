<?php
require_once 'config.php'; 


            if(isset($_SESSION["mail"]) && isset($_POST['valid'])){

                $mal = $_SESSION['mail'];
                $req1 = $bdd->prepare('SELECT id FROM utilisateurs WHERE email = ?');
                $req1->execute(array($mal));
                $res1 = $req1->fetch();

                $idrecup = (int) $res1[0];
                
                $_date = new DateTime();
                $_date = $_date->format('Y-m-d H:i:s'); 
                // print "L'id event : " . $_GET["id_event"] . " | l'id de la session : " . $_SESSION["user"] . " | la date : " . $_date;
                try {

                    // vérification si l'utilisateur a déjas inscrit une évenement :

                    $idevent = (int) $_GET['id_event'];

                $_reqq = $bdd->prepare("SELECT id_evenement FROM consulter WHERE id_evenement = :id_evenement AND id_client = :id_client");
                $_reqq->execute(array(
                    'id_client' => $idrecup,
                    'id_evenement' => $idevent
                ));
                $cher = $_reqq->fetch();

                var_dump($cher);
                // $arssss = $cher->rowCount();
                
                // var_dump($res2);

                
            
                // $cher = (int) $res2[1];
                         
                if ($arssss == 0) {
                    $_date = new DateTime();
                    $_date = $_date->format('Y-m-d H:i:s');
                    $_req = $bdd->prepare('INSERT INTO consulter (id_client , id_evenement , date_consultation ) VALUES (:id_client, :id_evenement, :date_consultation)');
                    $_req->execute(array(
                        'id_client' => $idrecup,
                        'id_evenement' => $_GET['id_event'],
                        'date_consultation' => $_date,
                    ));
                    header('Location: landing.php');
                    // print $_SESSION['user'] . $_GET['id_event'] . $_date;
                }else {
                    echo "event already shosen !";
                    header('Location: landing.php');
                }
                

                
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
        ?>   