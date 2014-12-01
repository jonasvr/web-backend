<?php

    $boodschap = '';

    if(isset($_REQUEST['submit']))
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=bieren','root','');

            //brouwer query toevoegen
            $query = 'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet) 
                                    VALUES(:brnaam, :adres, :postcode, :gemeente, :omzet)';
            $query = $db->prepare($query);

            //bindParam => http://php.net/manual/en/pdostatement.bindparam.php
            $query->bindParam( ':brnaam', $_POST[ 'brouwernaam' ] );
            $query->bindParam( ':adres', $_POST[ 'adres' ] );
            $query->bindParam( ':postcode', $_POST[ 'postcode' ] );
            $query->bindParam( ':gemeente', $_POST[ 'gemeente' ] );
            $query->bindParam( ':omzet', $_POST[ 'omzet' ] );

            $toegevoegd = $query->execute();
            //echo $toegevoegd;

            if ($toegevoegd)
            {
                // echo "in toegevoeg";
                $id = $db->lastInsertId(); //http://php.net/manual/en/pdo.lastinsertid.php
                $boodschap    =   'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ' . $id . '.';
            
            }else
            {
                //echo "mislukt";
                $boodschap = 'Er ging iets mis met het toevoegen, probeer opnieuw';
            }

        }

    catch ( PDOException $e ) // http://be2.php.net/manual/en/class.pdoexception.php
        {
            
            $boodschap = 'De connectie is mislukt.';
        }
    }

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD insert</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
            
            <h1>Opdracht CRUD insert: deel 1</h1>

            <ul>
                    <?php if ( $message !='' ): ?>
                        <h2><?php echo $boodschap; ?></h2>
                    <?php endif ?>  
                    <h1>Voeg een brouwer toe</h1>

                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST"
                        <ul>
                            <li>
                                <label for="brouwernaam">Brouwernaam</label>
                                <input type="text" id="brouwernaam" name="brouwernaam">
                            </li>
                            <li>
                                <label for="adres">adres</label>
                                <input type="text" id="adres" name="adres">
                            </li>
                            <li>
                                <label for="postcode">postcode</label>
                                <input type="text" id="postcode" name="postcode">
                            </li>
                            <li>
                                <label for="gemeente">gemeente</label>
                                <input type="text" id="gemeente" name="gemeente">
                            </li>
                            <li>
                                <label for="omzet">omzet</label>
                                <input type="text" id="omzet" name="omzet">
                            </li>
                        </ul>
                        <input type="submit" name="submit">
                    </form>
                
                </li>
            </ul>
            
        </section>     
    </body>
</html>
