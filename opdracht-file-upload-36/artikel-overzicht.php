<?php
session_start();
include('redirect-login.php');
    try
        {
            $db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms','root','');


            if(isset($_GET['verwijderID']))
            {
                $ID = $_GET['verwijderID'];
                $query = 'UPDATE Artikels
                            SET is_archived=1
                            WHERE ID="'.$ID.'";';
                $statement=$db->prepare($query);
                //$statement->$bindParam(':ID',$ID); werkte niet? help?
                $statement->execute();
            }

            if(isset($_GET['activatieID']))
            {
                $ID = $_GET['activatieID'];
                if ($_GET['is_active'])
                {
                    //$active = 0;
                    $query = 'UPDATE Artikels
                            SET is_active= 0
                            WHERE ID="'.$ID.'";';
                }
                else
                {
                    $query = 'UPDATE Artikels
                            SET is_active= 1
                            WHERE ID="'.$ID.'";';
                }
                /*$query = 'UPDATE Artikels
                            SET is_active="'.$active'".
                            WHERE ID=:ID;';*/
                $statement=$db->prepare($query);
                //$statement->$bindParam(':ID',$ID); werkte niet? help?
                $statement->execute();
            }

                $query = 'SELECT * FROM Artikels where is_archived=0';
                $statement=$db->prepare($query);
                $statement->execute();
                $Artikels = array();

        while ( $row = $statement->fetch(PDO::FETCH_ASSOC)) //Geeft een associatieve array (tabelnaam => value)
            {
                $artikels[] = $row; 
            }
        }
        catch ( PDOException $e ) // http://be2.php.net/manual/en/class.pdoexception.php
        {
            $_SESSION['notification']['message']=  'De connectie is mislukt.';       
        }

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>overzicht-artikels</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
        <style>

            form textarea, form input[type="text"]
            {
                padding:6px;
                width: 50%;
                font-size:16px;
            }
                
                article
                {
                    padding:16px;
                    margin-bottom: 16px;
                }

                article > h3
                {
                    margin-top:0;
                }

                .non-active
                {
                    background-color:#EEEEEE;
                }
        </style>
        
    </head>
    <body class="web-backend-opdracht">
    <?php include('header.php'); ?>
    <h1>Overzicht van de artikels</h1>
    <?php if($artikels == null): ?>                    
        <p>Geen artikels gevonden</p>
    <?php else: ?>
    
        <?php foreach ($artikels as $key => $artikel): ?>
            <article class="<?php echo ($artikel['is_active'])?"active":"non-active"?>">
                <ul>
                    <h3><?=$artikel['titel']?></h3>
                    <li>Artikel: <?=$artikel['artikel']?></li>
                    <li>Kernwoorden: <?=$artikel['kernwoorden']?></li>
                    <li>Datum: <?=$artikel['datum']?></li>
                </ul>
                <a href="artikel-wijzigen-form.php?wijzigID=<?=$artikel['ID']?>">artikel wijzigen</a> 
                | <a href="artikel-overzicht.php?activatieID=<?=$artikel['ID']?>&is_active=<?=$artikel['is_active']?>"><?php echo ($artikel['is_active'])?"activeren":"deactiveren"?></a> 
                | <a href="artikel-overzicht.php?verwijderID=<?=$artikel['ID']?>">artikel verwijderen</a>
            </article>
        <?php endforeach ?>
    <?php endif ?>
    <p><a href="artikel-toevoegen-form.php">Voeg een artikel toe</a></p>
    <?php if(isset($_SESSION['notification']['message'])):?> 
        <p><?=$_SESSION['notification']['message']?></p> 
    <?php endif ?>
    </body>
</html>